<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) 2021 CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

return [
    'missingDatabaseTable'   => '`sessionSavePath` deve ter o nome da tabela para o Database Session Handler funcionar.',
    'invalidSavePath'        => "Sessão: O save path '{0}' configurado não é um diretório, não existe ou não pode ser criado.",
    'writeProtectedSavePath' => "Sessão: O save path '{0}' configurado não é gravável pelo processo do PHP.",
    'emptySavePath'          => 'Sessão: Nenhum save path configurado.',
    'invalidSavePathFormat'  => 'Sessão: Formato do Redis save path é inválido: {0}',
];
