<?php

namespace BasketWithBalls\Scenario;

/**
 * Abstract Scenario Class
 *
 * @author Dariusz Paduch <dariusz.paduch@gmail.com>
 */
abstract class AbstractScenario
{
    /**
     * Scenario Registry.
     *
     * @var Registry
     */
    protected $registry;

    /**
     * Commands to run in scenario.
     *
     * @var \Closure[]
     */
    protected $commands = [];

    /**
     * @param Registry $registry Registry of scenario
     */
    public function __construct(Registry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * Returns scenario registry
     *
     * @return Registry
     */
    public function getRegistry()
    {
        return $this->registry;
    }

    /**
     * Returns maxumum number of ball.
     *
     * @return integer
     */
    abstract public function getMaximumNumberOfBall();

    /**
     * Adds command to scenario.
     *
     * @param \Closure $command
     *
     * @return \BasketWithBalls\Scenario\AbstractScenario
     */
    public function addCommand(\Closure $command)
    {
        $this->commands[] = $command;
        return $this;
    }

    /**
     * Runs scenario.
     */
    public function run()
    {
        foreach ($this->commands as $command) {
            if ($this->runCommand($command) === false) {
                break;
            }
        }
    }

    /**
     * Runs command.
     *
     * @param \Closure $command
     *
     * @return boolean
     */
    protected function runCommand(\Closure $command)
    {
        return $command($this->registry);
    }
}
