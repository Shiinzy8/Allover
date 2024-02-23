<?php

	interface Engine {
		public function getFuelType();
		public function start();
	}

	class Car
	{
		private Engine $engine;

		public function __constructor(Engine $engine) {
			$this->engine = $engine;
		}


		public function drive(): bool
		{ 
			try {
				$this->engine->start();
			} catch (Exception $e) {
				return false;
			}
			return true;
		}
	}

	class ElecticEngine implements Engine
	{
		public string $type = 'electric';

		public function getFuelType(): string
		{
			return $this->type;
		}

		public function start(): void
		{
			if ($this->isBatteryEmpty()) {
				throw new \Exception('Please re-charge me');
			}       
		}

		public function isBatteryEmpty(): bool
		{
            return true;
		}
	}
