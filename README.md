# GitHub Activity CLI

This project is a simple command line interface (CLI) application that fetches and displays the recent activity of a specified GitHub user using the GitHub API.

## Requirements

- PHP 7.4 or higher
- Composer for dependency management

## Installation

1. Clone the repository:

   ```
   git clone https://github.com/yourusername/github-activity-cli.git
   ```

2. Navigate to the project directory:

   ```
   cd github-activity-cli
   ```

3. Install the dependencies using Composer:

   ```
   composer install
   ```

## Usage

To run the CLI and fetch the recent activity of a GitHub user, use the following command:

```
bin/github-activity <username>
```

Replace `<username>` with the GitHub username you want to check.

### Example

```
bin/github-activity kamranahmedse
```

This command will display the recent activity of the user `kamranahmedse` in the terminal.

## Features

- Fetches recent activity from the GitHub API.
- Displays activity in a user-friendly format.
- Handles errors gracefully, such as invalid usernames or API failures.

## Contributing

Feel free to submit issues or pull requests to improve the project. 

## License

This project is open-source and available under the MIT License.