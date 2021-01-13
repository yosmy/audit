<?php

namespace Yosmy;

/**
 * @di\service()
 */
class DelegatorExecuteAudit implements ExecuteAudit
{
    /**
     * @var ExecuteAudit[]
     */
    private $executeAuditServices;

    /**
     * @di\arguments({
     *     executeAuditServices: '#yosmy.execute_audit'
     * })
     *
     * @param ExecuteAudit[] $executeAuditServices
     */
    public function __construct(
        array $executeAuditServices
    ) {
        $this->executeAuditServices = $executeAuditServices;
    }

    /**
     * {@inheritDoc}
     */
    public function execute()
    {
        foreach ($this->executeAuditServices as $executeAudit) {
            $executeAudit->execute();
        }
    }
}