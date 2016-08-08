# Work assignment

![](https://media.giphy.com/media/l4Ho9SUtchnKtOx32/giphy.gif)

This is your work assignment for today. **Please work on the checklist items in
the given order.** It's **not** about finishing all items as fast as
you can. It's about looking at the code and the changes I made, spotting the
things you don't understand and using the online
[PHP documentation](https://secure.php.net/manual/en/index.php) to find out
how it works. Besides the PHP documentation
[Stack Overflow](https://stackoverflow.com/) is a good place to look things up.
Take yourself time!

**If you make changes to the code while working on a task please commit them with
along with a descriptive commit message before starting the next task.**

## Git / GitHub
  - [ ] Merge the pull request I created on your playground repos.
  - [ ] Have a look at the commits. See what changes I made to your code.
    Execute it to see its output. Talk about the changes and discoveries to make
    sure you two have the same understanding about them.

## Reading and understanding
  - [ ] As you can see the functions I added to your codebase look a little bit
    different than the ones you wrote yourself. Inform yourself about
    *argument type declarations* and *return type declarations*. What are
    they meant for? Play around with them. What happens when you pass a
    `string` into a `float` parameter? Try some different combinations and think
    about them.
  - [ ] Add the proper argument and return types to the `accelerate` and
    `decelerate` function.
  - [ ] I added a `debug` function to have formatted output of the interesting
    variables in use. Inform yourself about `printf` and find find out how
    this formatting stuff works.
  - [ ] The `debug` function looks much more different than the ones in the
    `car_manager.php` file. Find out about what *PHPDoc* is in general.
    What are common *PHPDoc tags*? If you want to see how *PHPDoc* is used
    out in the wild have a look at the
    [Symfony Project](https://github.com/symfony/symfony) on GitHub.
  - [ ] Apply proper *PHPDoc* comments to all the functions.

## Finally, some coding!
  - [ ] Have a look at the `obsolescence` function. What does it do? Have a look
    at the `switch` construct in the PHP documentation. Apply your newly earned
    knowledge! Transform the code into a `switch` statement.
  - [ ] Modify the `accelerate` and `decelerate` methods in a way that the
    `status` is automatically set to the correct value. Allowed status
    values are `parking`, `running` (as in motor is running but the car is
    not moving) and `driving`.
  - [ ] Have a look at the `drive` function. It makes use of the `accelerate`
    function. Now have a look at `cars.php` where the car stops in front of the
    red light. What is going on there? Why does the car stop? Any ideas?
  - [ ] Thinking about your new insights: Does the concept of an `accelerate`
    and `decelerate` function still make sense?
  - [ ] Incorporate the functionality of those both functions directly in the
    `drive` function.
  - [ ] Now I want you to take care of the
    [invariants](https://de.wikipedia.org/wiki/Invariante_(Informatik)) of a
    car. Invariants in short: Your code has to make sure that everything you
    somehow specified is met and made sure of in your code. For example: We have
    specified a `$maxSpeed` variable. You made sure that a car is not allowed
    to drive faster than this value and handled this case gracefully. On the
    other hand it makes no sense to have negative speed. So the invariant is:
    speed always have to be between `0` and `$maxSpeed`.

    Now please think about the following specifications and how you could handle
    those invariants. Implement them accordingly (there are of course multiple
    correct ways of doing this):
      - [ ] Stopping a driving car at for example 150km/h is insane!
      - [ ] Stopping a car before it was started makes no sense.
      - [ ] Starting an already running car seems strange.
      - [ ] Starting a car which has died due to its planned obsolescence should
        not be possible.
      - [ ] Driving with a car which is not `started` is not possible.
      - [ ] Could you think of further invariants?

  - [ ] Add some more cars to your code! I would like to have the Beemer doing
    a race against a Mercedes, a Volkswagen and another brand of your choice.
    Drive all of them to death!
  - [ ] After having so many cars in your code what do you think about it (your
    code). Does it still read well? Is it easy to understand what's happening
    there? Can you imagine ways of having many cars (e.g. > 100) but still
    having readable code?
