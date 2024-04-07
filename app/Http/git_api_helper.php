<?php

namespace App\Http;

/**
 * Class git_api_helper used to simplify CURL operations 
 */
class git_api_helper
{

    /**
     * Method used to get all issues
     */
    public function getAllIssues()
    {
        //hardcoded the url since its only issues endpoint
        $url = "https://api.github.com/repos/SovengaGit/Todo-App/issues";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Authorization: Bearer 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',
                'Accept: application/vnd.github+json', 'user-agent: node.js', 'X-GitHub-Api-Version: 2022-11-28'
            )
        );
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
    /**
     * Method used to get an issue by passing ID issues
     */
    public function getIssue($id)
    {
        //hardcoded the url since its only issues endpoint
        $url = "https://api.github.com/repos/SovengaGit/Todo-App/issues";
        //$assignees = array("SovengaGit");
        $labels = array("todo app bug");
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Authorization: Bearer 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',
                'Accept: application/vnd.github+json', 'user-agent: node.js', 'X-GitHub-Api-Version: 2022-11-28'
            )
        );
        $result = curl_exec($curl);
        curl_close($curl);
        return json_encode($result);
    }
    /**
     * Method used to create a GITHUB issue
     */
    public function createIssue($title, $body, $assignees)
    {
        if (empty($assignees)) {
            $assignees = "SovengaGit";
        }
        $url = "https://api.github.com/repos/SovengaGit/Todo-App/issues";
        //$assignees = array("SovengaGit");
        $labels = array("todo app bug");
        $data = array("title" => $title, "body" => $body, "assignees" => array($assignees)); //, , "labels" => array($labels)
        $payload = json_encode($data, true);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Authorization: Bearer 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',
                'Accept: application/vnd.github+json', 'user-agent: node.js', 'X-GitHub-Api-Version: 2022-11-28'
            )
        );
        $result = curl_exec($curl);
        curl_close($curl);
        return json_encode($result);
    }
    /**
     * Method used to update an issue to closed status
     */
    public function updateIssue($owner, $repo, $issue_number, $state)
    {
        $owner = "SovengaGit";
        $repo = "Todo-App";
        #$url = "https://api.github.com/repos/SovengaGit/Todo-App/issues";
        $url = "https://api.github.com/repos/$owner/$repo/issues/$issue_number";
        //$assignees = array("SovengaGit");
        $data = array("state" => "$state"); //, "assignees" => array($assignees), "labels" => array($labels)
        $payload = json_encode($data, true);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Authorization: Bearer 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',
                'Accept: application/vnd.github+json', 'user-agent: node.js', 'X-GitHub-Api-Version: 2022-11-28'
            )
        );
        $result = curl_exec($curl);
        curl_close($curl);
        return json_encode($result);
    }
}
