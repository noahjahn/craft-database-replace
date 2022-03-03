<?php
namespace noahjahn\databasereplace\controllers;

use craft\web\Controller;
use yii\web\Response;
use noahjahn\databasereplace\helpers\Db;

class DatabaseReplaceController extends Controller
{
    /**
     * Performs a DB Replace action
     *
     * @return Response|null
     * @throws ForbiddenHttpException if the user doesn't have access to the Database Replace Utility
     * @throws Exception if the database couldn't be replaced
     */
    public function actionReplace(): Response
    {
        $this->requireCpRequest();
        $this->requireAdmin(); // TODO: make this configurable
        // $this->requirePermission('utility:database-replace');

        $backupResult = Db::backup($this->request->getBodyParam('downloadBackup'));
        
        if ($backupResult !== true) {
            $this->response->sendFile($backupResult, null, [
                'mimeType' => 'application/zip',
            ]);
        }

        // perform replace...

        return $this->asJson(['success' => true]);
    }
}
