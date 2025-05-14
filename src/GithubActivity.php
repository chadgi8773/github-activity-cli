<?php class GithubActivity {
    private $username;
    private $apiUrl;

    public function __construct($username) {
        $this->username = $username;
        $this->apiUrl = "https://api.github.com/users/{$username}/events";
    }

    public function fetchActivity() {
        $context = stream_context_create([
            'http' => [
                'header' => "User-Agent: PHP"
            ]
        ]);
        
        $response = file_get_contents($this->apiUrl, false, $context);
        
        if ($response === FALSE) {
            throw new Exception("Error fetching activity for user: {$this->username}");
        }

        return json_decode($response, true);
    }

    public function processActivity($activities) {
        $output = [];
        
        foreach ($activities as $activity) {
            $type = $activity['type'];
            $repo = $activity['repo']['name'];
            $createdAt = date('l jS Y', strtotime($activity['created_at']));

            switch ($type) {
                case 'PushEvent':
                    $commits = count($activity['payload']['commits']);
                    $output[] = "Pushed {$commits} commits to {$repo} on {$createdAt}";
                    break;
                case 'IssuesEvent':
                    if ($activity['payload']['action'] === 'opened') {
                        $output[] = "Opened a new issue in {$repo} on {$createdAt}";
                    }
                    break;
                case 'WatchEvent':
                    $output[] = "Starred {$repo} on {$createdAt}";
                    break;
                // Add more cases as needed for different event types
            }
        }

        return $output;
    }
} ?>