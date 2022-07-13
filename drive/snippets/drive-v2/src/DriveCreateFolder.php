<?php
/**
 * Copyright 2022 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

 // [START drive_create_folder]
use Google\Client;
use Google\Service\Drive;
function createFolder() {
    try {
        /* Load pre-authorized user credentials from the environment.
         TODO (developer) - See https://developers.google.com/identity for
          guides on implementing OAuth2 for your application. */
        $client = new Client();
        $client->useApplicationDefaultCredentials();
        $client->addScope(Drive::DRIVE);
        $driveService = new Drive($client);
        $fileMetadata = new Drive\DriveFile(array([
            'name' => 'A',
            'mimeType' => 'application/vnd.google-apps.folder']));
        $file = $driveService->files->create($fileMetadata, array([
            'fields' => 'id']));
        printf("Folder ID: %s\n", $file->id);
    }catch(Exception $e) {
        echo "Error Message: ".$e;
    }
}
// [END drive_create_folder]

require_once 'vendor/autoload.php';
createFolder();