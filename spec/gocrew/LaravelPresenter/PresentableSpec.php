<?php

namespace spec\gocrew\LaravelPresenter;

use Mockery;
use PhpSpec\ObjectBehavior;

class PresentableSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beAnInstanceOf('spec\gocrew\LaravelPresenter\DummyEntity');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('spec\gocrew\LaravelPresenter\DummyEntity');
    }

    public function it_fetches_a_valid_presenter()
    {
        Mockery::mock('DummyEntityPresenter');

        $this->present()->shouldBeAnInstanceOf('DummyEntityPresenter');
    }

    public function it_throws_up_if_invalid_presenter_is_provided()
    {
        $this->presenter = 'Invalid';

        $this->shouldThrow('gocrew\LaravelPresenter\PresenterException')->duringPresent();
    }

    public function it_caches_the_presenter_for_future_use()
    {
        Mockery::mock('DummyEntityPresenter');

        $one = $this->present();
        $two = $this->present();

        $one->shouldBe($two);
    }
}

class DummyEntity
{
    use \gocrew\LaravelPresenter\Presentable;

    public $presenter = 'DummyEntityPresenter';
}
