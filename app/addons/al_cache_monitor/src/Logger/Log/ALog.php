<?php
/****************************************************************************
 *                                                                          *
 *   © ASAP Lab Ltd.                                                        *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 ***************************************************************************/

namespace Tygh\Addons\AlCacheMonitor\Logger\Log;

use Tygh\Registry;

abstract class ALog
{
    private $type;

    private $timestamp;

    private $content = [];

    private $request = [];

    public function __construct(string $type)
    {
        $this->type = $type;
        $this->timestamp = TIME;
        $this->request = $this->getRequest();
    }

    abstract public function buildContent(array $content): array;

    public function setContent(array $content): void
    {
        $this->content = $this->buildContent($content);
    }

    private function getRequest(): array
    {
        if (empty($_REQUEST['dispatch'])) {
            $runtime = Registry::get('runtime');

            $dispatch = implode('.', [
                $runtime['controller']     ?? '',
                $runtime['mode']           ?? '',
                $runtime['action']         ?? '',
                $runtime['dispatch_extra'] ?? '',
            ]);
        } else {
            $dispatch = $_REQUEST['dispatch'];
        }

        return [
            'dispatch'       => $dispatch,
            'REQUEST_METHOD' => $_SERVER['REQUEST_METHOD'] ?? '',
            'REQUEST_URI'    => $_SERVER['REQUEST_URI']    ?? '',
            'HTTP_REFERER'   => $_SERVER['HTTP_REFERER']   ?? ''
        ];
    }

    public function toArray(): array
    {
        return [
            'type'      => $this->type,
            'timestamp' => $this->timestamp,
            'content'   => $this->content,
            'request'   => $this->request
        ];
    }

    public function toArrayWithSerialize(): array
    {
        return array_map(function ($log_row) {
            return is_array($log_row) ? serialize($log_row) : $log_row;
        }, $this->toArray());
    }

    public function isContentExists(): bool
    {
        return !empty($this->content);
    }
}
