<?php

namespace Crazybee47\Laravel\Bitrix24\Feature;

trait BusinessProcess
{
    public function bizprocWorkflowStart(int $id, array $documentId, array $params = []): void
    {
        $data = [
            'TEMPLATE_ID' => $id,
            'DOCUMENT_ID' => $documentId,
            'PARAMETERS' => $params,
        ];
        $this->getCoreApiClient()->call('bizproc.workflow.start', $data);
    }

    public function bizprocActivityAdd(array $data): void
    {
        $this->getCoreApiClient()->call('bizproc.activity.add', $data);
    }

    public function bizprocActivityDelete(string $code): void
    {
        $this->getCoreApiClient()->call('bizproc.activity.delete', ['CODE' => $code]);
    }

    public function bizprocActivityLog(string $eventToken, string $message): void
    {
        $this->getCoreApiClient()->call('bizproc.activity.log', ['EVENT_TOKEN' => $eventToken, 'LOG_MESSAGE' => $message]);
    }

    public function bizprocEventSend(string $eventToken, array $returnValues): void
    {
        $this->getCoreApiClient()->call('bizproc.event.send', ['EVENT_TOKEN' => $eventToken, 'RETURN_VALUES' => $returnValues]);
    }
}
