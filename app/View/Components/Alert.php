<?php

    namespace App\View\Components;

    use Closure;
    use Illuminate\Contracts\View\View;
    use Illuminate\View\Component;

    class Alert extends Component
    {

        private string $type;
        private int $duration;

        /**
         * Create a new component instance.
         */
        public function __construct(string $type, int $duration = 5000)
        {
            $this->type = $type;
            $this->duration = $duration;
        }

        /**
         * Get the view / contents that represent the component.
         */
        public function render(): View|Closure|string
        {
            return view('admin.components.alert.alert', [
                'type' => $this->type,
                'duration'=> $this->duration
            ]);
        }

        public function getType(): string
        {
            return $this->type;
        }

        public function setType(string $type): void
        {
            $this->type = $type;
        }

        /**
         * @return int
         */
        public function getDuration(): int
        {
            return $this->duration;
        }

        /**
         * @param int $duration
         */
        public function setDuration(int $duration): void
        {
            $this->duration = $duration;
        }
    }
