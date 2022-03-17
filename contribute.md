## json-mapper-issue: nullable values
- ensure that the nullable type is marked without spaces in docblock
  -  `/** @var string|null */`
    protected $property;
- with spaces, the nullable is not recognized automatically... 