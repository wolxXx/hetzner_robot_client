# hetzner_robot_client

- purpose of this project
    - connect to the hetzner web service
    - create / update / delete / list storage boxes
    - create / show / update / delete subaccounts for the storage box
    - later using this client to manage hetzner servers
    - short: implementation of https://robot.your-server.de/doc/webservice/de.html#storage-box
- you need:
    - php, did the first steps with version 7.1, should run in older versions too...
    - a web service user from hetzner https://robot.your-server.de/preferences/index
        - this is not your common login to the robot or to the storage box or server
    - a storage box or server hosted at hetzner :)
- install locally:
    - php composer.phar install should do the job
    - there is a playground.php for playing around
        - add a local.php copied from local.template.php and adjust the username and password
        - it will grab all storage boxes and create and delete a new box for testing
- todo
    - dtos for all types
    - requests for all end-points
    - mocking for testing calls
        - see http://www.inanzzz.com/index.php/post/7cwp/mocking-guzzle-and-testing-external-api-with-phpunit

## features

| Feature                        | Status   |
|------------------------------|----------|
| StorageBox listing             | &#10003; |
| StorageBox single retrieve     | &#10003; |
| StorageBox update              | &#10003; |
| StorageBox delete              | &#120; |

