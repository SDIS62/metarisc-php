<?php

namespace Metarisc\Service;

use Metarisc\MetariscAbstract;
use Psr\Http\Message\ResponseInterface;

class ResumableFileUploadsAPI extends MetariscAbstract
{
    protected function replacements(array $replacement_table) : \Closure
    {
        return function (array $matches) use ($replacement_table) : string {
            /** @var array-key $key */
            $key = $matches[1];
            /** @var string $replacement */
            $replacement = $replacement_table[$key] ?? $matches[0];

            return $replacement;
        };
    }

    /**
     * Une requête POST vide est utilisée pour créer une nouvelle ressource de téléchargement. L'en-tête Upload-Length indique la taille de l'ensemble du téléchargement en octets. Si l'extension Création avec téléchargement est disponible, le client peut inclure des parties du téléchargement dans la demande de création initiale.
     */
    public function createNewUploadResource(string $body) : ResponseInterface
    {
        return $this->request('POST', '/resumable-file-uploads/files', [
            'json' => [$body,
            ],
        ]);
    }

    /**
     * Lors de la réception d'une demande DELETE pour un téléchargement existant, l'API tus-resumable-uploads libére les ressources associées et répond avec le status code 204 No Content confirmant que le téléchargement a été terminé. Pour toutes les demandes futures à cette URL, l'API tus-resumable-uploads répond avec le status code 404 Not Found ou 410 Gone.
     */
    public function deleteFile(mixed $tus_resumable, string $id) : ResponseInterface
    {
        $table = [
            'Tus-Resumable' => $tus_resumable,
            'id'            => $id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/resumable-file-uploads/files/{id}');

        return $this->request('DELETE', $path);
    }

    /**
     * Une demande OPTIONS PEUT être utilisée pour recueillir des informations sur la configuration actuelle du serveur. Une réponse réussie indiquée par le status code 204 Pas de contenu ou 200 OK DOIT contenir l'en-tête Tus-Version. Il PEUT inclure les en-têtes Tus-Extension et Tus-Max-Size.
     */
    public function getServerInfo() : ResponseInterface
    {
        $table = [
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/resumable-file-uploads/files');

        return $this->request('OPTIONS', $path);
    }

    /**
     * Utilisé pour déterminer le décalage auquel le téléchargement doit être poursuivi.
     */
    public function getUploadOffset(mixed $tus_resumable, string $id) : ResponseInterface
    {
        $table = [
            'Tus-Resumable' => $tus_resumable,
            'id'            => $id,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/resumable-file-uploads/files/{id}');

        return $this->request('HEAD', $path);
    }

    /**
     * L'API tus-resumable-uploads accepte les requêtes PATCH contre toute URL de téléchargement et applique les octets contenus dans le message au décalage donné spécifié par l'en-tête Upload-Offset. Toutes les requêtes PATCH DOIVENT utiliser Content-Type : application/offset+octet-stream, sinon l'API resumable-uploads renvoi un status code 415 Unsupported Media Type.
     */
    public function patchFile(mixed $tus_resumable, int $content_length, int $upload_offset, string $id, string $upload_checksum = null, string $body = null) : ResponseInterface
    {
        $table = [
            'Tus-Resumable'   => $tus_resumable,
            'Content-Length'  => $content_length,
            'Upload-Offset'   => $upload_offset,
            'id'              => $id,
            'Upload-Checksum' => $upload_checksum,
            ];

        $path = preg_replace_callback('/\{([^}]+)\}/', $this->replacements($table), '/resumable-file-uploads/files/{id}');

        return $this->request('PATCH', $path);
    }
}