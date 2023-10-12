<?php

namespace Tests\HTTP\Controllers;

use App\Http\Controllers\UserController;
use App\Models\Company;
use App\Models\User;
use App\Services\CompanyService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Symfony\Component\HttpFoundation\JsonResponse;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use DatabaseMigrations;

    private array $data = [
        'first_name' => 'First',
        'last_name' => 'Test',
        'phone' => '066-01-01-001',
        'email' => 'first@test.com',
        'password' => 'first',
    ];

    private ?string $bearerToken = null;

    protected function setUp(): void
    {
        parent::setUp();

        $this->json('POST', 'api/user/register', $this->data)
            ->seeJson(['message' => 'Successfully created!'])
            ->assertResponseStatus(JsonResponse::HTTP_CREATED);
        $this->seeInDatabase('users', ['email' => 'first@test.com']);
    }

    private function login(): void
    {
        $response = $this->call('POST', 'api/user/sign-in', [
            'email' => 'first@test.com',
            'password' => 'first',
        ]);

        $this->assertEquals(JsonResponse::HTTP_OK, $response->getStatusCode());
        $this->bearerToken = $response->getData()->bearer_token ?? null;
        $this->assertNotEmpty($this->bearerToken);
    }

    public function testRegister()
    {
        $userServiceMock = $this->getMockBuilder(UserService::class)
            ->disableOriginalConstructor()
            ->getMock();

        $userServiceMock->expects($this->once())
            ->method('createFromRequest')
            ->willReturn(null);

        $companyService = $this->getMockBuilder(CompanyService::class)
            ->disableOriginalConstructor()
            ->getMock();

        // test fail
        $controller = new UserController($userServiceMock, $companyService);
        $response = $controller->register(new Request(array_merge($this->data, ['email' => 'second@test.com'])));
        $this->assertEquals(JsonResponse::HTTP_CONFLICT, $response->getStatusCode());

        // test wrong request data
        $this->json('POST', 'api/user/register', $this->data)
            ->assertResponseStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function testSignIn()
    {
        $data = [
            'email' => 'first@test.com',
            'password' => 'first',
        ];

        // test success
        $response = $this->call('POST', 'api/user/sign-in', $data);
        $this->assertEquals(JsonResponse::HTTP_OK, $response->getStatusCode());
        $this->assertNotEmpty($response->getData()->bearer_token ?? null);
        $this->assertNotEmpty($response->getData()->expires_in ?? null);

        $data = [
            'email' => 'first@test.com',
            'password' => 'second',
        ];

        // test faul
        $this->json('POST', 'api/user/sign-in', $data)
            ->assertResponseStatus(JsonResponse::HTTP_UNAUTHORIZED);

        $data = [
            'email' => 'second@test.com',
            'password' => 'second',
        ];

        // test wrong request data
        $this->json('POST', 'api/user/sign-in', $data)
            ->assertResponseStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function testRecoveryPassword()
    {
        $data = [
            'email' => 'first@test.com',
        ];

        // recovery user password
        $response = $this->call('POST', 'api/user/recovery-password', $data);
        $this->assertEquals(JsonResponse::HTTP_OK, $response->getStatusCode());
        $user = User::query()->where(['email' => 'first@test.com'])->first();
        $this->assertNotNull($user->email_token);
        $this->assertNotNull($user->valid_to);

        $userServiceMock = $this->getMockBuilder(UserService::class)
            ->disableOriginalConstructor()
            ->getMock();

        $userServiceMock->expects($this->once())
            ->method('generateEmailToken')
            ->willReturn(false);

        $companyService = $this->getMockBuilder(CompanyService::class)
            ->disableOriginalConstructor()
            ->getMock();

        // test fail
        $controller = new UserController($userServiceMock, $companyService);
        $response = $controller->recoveryPassword(new Request($data));
        $this->assertEquals(JsonResponse::HTTP_CONFLICT, $response->getStatusCode());

        $data = [
            'email' => 'second@test.com',
        ];

        // test wrong data in request
        $this->json('POST', 'api/user/sign-in', $data)
            ->assertResponseStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function testResetPassword()
    {
        $data = ['email' => 'first@test.com'];

        // recovery user password
        $response = $this->call('POST', 'api/user/recovery-password', $data);
        $this->assertEquals(JsonResponse::HTTP_OK, $response->getStatusCode());
        $user = User::query()->where(['email' => 'first@test.com'])->first();
        $this->assertNotNull($user->email_token);
        $this->assertNotNull($user->valid_to);

        $data = [
            'email' => 'first@test.com',
            'email_token' => 'wrong_token',
            'password' => 'second',
        ];

        // reset with wrong token
        $this->json('PATCH', 'api/user/recovery-password', $data)
            ->assertResponseStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);

        $data = [
            'email' => 'first@test.com',
            'email_token' => $user->email_token,
            'password' => 'second',
        ];

        $userServiceMock = $this->getMockBuilder(UserService::class)
            ->disableOriginalConstructor()
            ->getMock();

        $userServiceMock->expects($this->once())
            ->method('updatePassword')
            ->willReturn(false);

        $companyService = $this->getMockBuilder(CompanyService::class)
            ->disableOriginalConstructor()
            ->getMock();

        // test fail
        $controller = new UserController($userServiceMock, $companyService);
        $response = $controller->resetpassword(new Request($data));
        $this->assertEquals(JsonResponse::HTTP_CONFLICT, $response->getStatusCode());

        // reset with correct token
        $this->json('PATCH', 'api/user/recovery-password', $data)
            ->assertResponseOk();

        $data = [
            'email' => 'first@test.com',
            'password' => 'first',
        ];

        // login with old password
        $this->json('POST', 'api/user/sign-in', $data)
            ->assertResponseStatus(JsonResponse::HTTP_UNAUTHORIZED);

        $data = [
            'email' => 'first@test.com',
            'password' => 'second',
        ];

        // login with new password
        $response = $this->call('POST', 'api/user/sign-in', $data);
        $this->assertEquals(JsonResponse::HTTP_OK, $response->getStatusCode());
        $this->assertNotEmpty($response->getData()->bearer_token ?? null);
        $this->assertNotEmpty($response->getData()->expires_in ?? null);
    }

    public function testCompaniesAdd()
    {
        $user = User::query()->where(['email' => 'first@test.com'])->first();

        $data = [];

        $this->json('POST', 'api/user/companies', $data)
            ->assertResponseStatus(JsonResponse::HTTP_UNAUTHORIZED);
        $this->json('GET', 'api/user/companies', $data)
            ->assertResponseStatus(JsonResponse::HTTP_UNAUTHORIZED);

        $this->login();

        $this->json('GET', 'api/user/companies', $data)
            ->receiveJson(['companies' => []])
            ->assertResponseOk();

        $this->json('POST', 'api/user/companies', $data)
            ->assertResponseStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);

        $firstData = [
            'title' => 'First company',
            'phone' => '066-01-01-001',
            'description' => 'Desc 1',
        ];

        $this->json('POST', 'api/user/companies', $firstData)
            ->assertResponseOk();
        $company = Company::query()->where(['title' => 'First company'])->first();
        $this->assertNotNull($company);
        $this->assertTrue($user->companies()->where('company_id', $company->id)->exists());

        $secondData = [
            'title' => 'Second company',
            'phone' => '066-01-01-002',
            'description' => 'Desc 2',
        ];

        $this->json('POST', 'api/user/companies', $secondData)
            ->assertResponseOk();
        $company = Company::query()->where(['title' => 'Second company'])->first();
        $this->assertNotNull($company);
        $this->assertTrue($user->companies()->where('company_id', $company->id)->exists());


        $response = $this->actingAs($user)->call('GET', 'api/user/companies', ['Authorization' => 'Bearer ' . $this->bearerToken]);
        $this->assertEquals(JsonResponse::HTTP_OK, $response->getStatusCode());
        $this->receiveJson(['companies' => [
            $firstData,
            $secondData,
        ]]);
    }

    public function testCompaniesShow()
    {
        $this->json('GET', 'api/user/companies')
            ->assertResponseStatus(JsonResponse::HTTP_UNAUTHORIZED);

        $this->login();

        $this->json('GET', 'api/user/companies')
            ->receiveJson(['companies' => []])
            ->assertResponseOk();
    }
}