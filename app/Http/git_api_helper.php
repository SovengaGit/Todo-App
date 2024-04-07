<?php

namespace App\Http;

class git_api_helper
{
    public function getAllIssues()
    {
        $url = "https://api.github.com/repos/SovengaGit/Todo-App/issues";
        //$assignees = array("SovengaGit");
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
    public function getIssue($id)
    {
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
    public function createIssue($title, $body, $assignees)
    {
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
