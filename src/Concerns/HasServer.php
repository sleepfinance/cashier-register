<?php

namespace Forgeify\CashierRegister\Concerns;

trait HasServer
{
    /**
     * The instance price.
     *
     * @var float
     */
    protected $servers = null;
    /**
     * The currency of the instance.
     *
     * @var string
     */
    protected $sites =  null;
    /**
     * etermines if database backups are enabled for the plan
     *
     * @var bool
     */
    protected $dbBackups = false;
    /**
     * etermines if server and site monitoring is enabled for the plan
     *
     * @var bool
     */
    protected $serverMonitor = false;

    /**
     * determines if teams are  enabled for the plan
     *
     * @var bool
     */
    protected $teams = false;

    /**
     * Set number of servers of the plan.
     *
     * @param  int|null  $servers
     * @return self
     */
    public function servers(int $servers = null)
    {
        $this->servers = $servers;
        return $this;
    }
    /**
     * Set number of sites of the plan.
     *
     * @param  int|null  $currency
     * @return self
     */
    public function sites(int $sites = null)
    {
        $this->sites = $sites;
        return $this;
    }

    /**
     * toggle database backups for the plan.
     *
     * @param  int|null  $currency
     * @return self
     */
    public function dbBackups(bool $dbBackups = false)
    {
        $this->dbBackups = $dbBackups;
        return $this;
    }

    /**
     * toggle server monitoring for the plan.
     *
     * @param  bool $currency
     * @return self
     */
    public function serverMonitor(bool $serverMonitor = false)
    {
        $this->serverMonitor = $serverMonitor;
        return $this;
    }

    /**
     * toggle teams enabled for the plan.
     *
     * @param  int|null  $currency
     * @return self
     */
    public function teams(bool $teams = false)
    {
        $this->teams = $teams;
        return $this;
    }

    /**
     * get database backups status for the plan.
     *
     * @return bool
     */
    public function getDbBackups(): bool
    {
        return $this->dbBackups;
    }

    /**
     * toggle server monitoring for the plan.
     *
     * @return bool
     */
    public function getServerMonitor(): bool
    {
        return  $this->serverMonitor;
    }

    /**
     * toggle teams enabled for the plan.
     *
     * @return bool
     */
    public function getTeams(): bool
    {
        return $this->teams;
    }

    /**
     * Get the number of servers in plan.
     *
     * @return int|null
     */
    public function getServers(): int|null
    {
        return $this->servers;
    }

    /**
     * Get the number of sites in plan.
     *
     * @return int|null
     */
    public function getSites(): int|null
    {
        return $this->sites;
    }
}
