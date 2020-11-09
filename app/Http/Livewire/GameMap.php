<?php

namespace App\Http\Livewire;

use App\Models\Game;
use App\Models\Phase;
use Livewire\Component;

class GameMap extends Component
{
    public Game $game;
    public Phase $phase;
    public bool $withOrders;
    public string $svg;

    // Show order
    // svg_adjudicated -> svg_with_orders -new Phase-> svg_adjudicated

    public function mount()
    {
        $this->phase = $this->game->current_phase;
        if (isset($this->phase->svg_with_orders)) {
            $this->withOrders = true;
            $this->svg = $this->phase->svg_with_orders;
        } else if (isset($this->phase->svg_adjudicated)) {
            $this->withOrders = false;
            $this->svg = $this->phase->svg_adjudicated;
        }
    }

    public function nextSVG()
    {
        if ($this->withOrders) {
            if (isset($this->phase->nextPhase)) {
                $this->phase = $this->phase->nextPhase;
            }
            if (isset($this->phase->svg_adjudicated)) {
                $this->svg = $this->phase->svg_adjudicated;
                $this->withOrders = false;
            }
        } else {
            if (isset($this->phase->svg_with_orders)) {
                $this->svg = $this->phase->svg_with_orders;
                $this->withOrders = true;
            }
        }
    }

    public function previousSVG()
    {
        if ($this->withOrders) {
            if (isset($this->phase->svg_adjudicated)) {
                $this->svg = $this->phase->svg_adjudicated;
                $this->withOrders = false;
            }
        } else {
            if (isset($this->phase->previousPhase)) {
                $this->phase = $this->phase->previousPhase;
            }
            if (isset($this->phase->svg_with_orders)) {
                $this->svg = $this->phase->svg_with_orders;
                $this->withOrders = true;
            }
        }
    }

    public function hasNextSVG(): bool
    {
        return ($this->withOrders
            && isset($this->phase->nextPhase->svg_adjudicated))
            || isset($this->phase->svg_with_orders);
    }
    public function hasPreviousSVG(): bool
    {
        return ($this->withOrders
            && isset($this->phase->svg_adjudicated))
            || isset($this->phase->previousPhase->svg_with_orders);
    }

    public function render()
    {
        return view('livewire.game-map');
    }
}
