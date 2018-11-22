$(function() {

/**
 * FUNCTION CALLS
 */


testFunction = () => {console.log(`This shit works!`)};
window.testFunction();






/**
 * 
 * AJAX REQUEST HEADERS
 * ------------------------------------------------------------------------ *
 */

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

/**
 * 
 * JAVASCRIPT STOPWATCH APP
 * ------------------------------------------------------------------------ *
 * Designed to operate the time inputs on batch extraction submission form.
 * Two seperate clocks will be running, one with 'lap' split functionality 
 * to track each step of the batch submission process.
 * ------------------------------------------------------------------------ *
 * 
 */
    var hours = (minutes = seconds = milliseconds = 0);
    var prev_hours = (prev_minutes = prev_seconds = prev_milliseconds = undefined);
    var timeUpdate;
    let splitCount = 0;

    // Start/Pause/Resume button onClick
    $("#start_pause_resume")
        .button()
        .click(function() {
            // Start button
            if ($(this).text() == "Start") {
                // check button label
                $(this).html("<span class='ui-button-text'>Pause</span>");
                updateTime(0, 0, 0, 0);
                lapSplit(0, 0, 0, 0);
            }
            // Pause button
            else if ($(this).text() == "Pause") {
                clearInterval(timeUpdate);
                clearInterval(lapUpdate);
                $(this).html("<span class='ui-button-text'>Resume</span>");
            }
            // Resume button
            else if ($(this).text() == "Resume") {
                prev_hours = parseInt($("#hours").html());
                prev_minutes = parseInt($("#minutes").html());
                prev_seconds = parseInt($("#seconds").html());
                prev_milliseconds = parseInt($("#milliseconds").html());

                updateTime(
                    prev_hours,
                    prev_minutes,
                    prev_seconds,
                    prev_milliseconds
                );

                $(this).html("<span class='ui-button-text'>Pause</span>");
            }
        });

    // set time split interval
    // run a loop to populate each split

    $("#time_split")
        .button()
        .click(function() {
            // setting the interval
            splitCount = lapInterval(splitCount);

            if (lapUpdate) clearInterval(lapUpdate);
            // reset watch to 0
            setLapWatch(0, 0, 0, 0);

            // restart second timer
            lapSplit(0, 0, 0, 0);
        });

    // Reset button onClick
    $("#reset")
        .button()
        .click(function() {
            if (timeUpdate) clearInterval(timeUpdate);
            if (lapUpdate) clearInterval(lapUpdate);
            setStopwatch(0, 0, 0, 0);
            setLapWatch(0, 0, 0, 0);
            $("#start_pause_resume").html(
                "<span class='ui-button-text'>Start</span>"
            );
        });

    // Update time in stopwatch periodically - every 25ms
    function updateTime(
        prev_hours,
        prev_minutes,
        prev_seconds,
        prev_milliseconds
    ) {
        var startTime = new Date(); // fetch current time

        timeUpdate = setInterval(function() {
            var timeElapsed = new Date().getTime() - startTime.getTime(); // calculate the time elapsed in milliseconds

            // calculate hours
            hours = parseInt(timeElapsed / 1000 / 60 / 60) + prev_hours;

            // calculate minutes
            minutes = parseInt(timeElapsed / 1000 / 60) + prev_minutes;
            if (minutes > 60) minutes %= 60;

            // calculate seconds
            seconds = parseInt(timeElapsed / 1000) + prev_seconds;
            if (seconds > 60) seconds %= 60;

            // calculate milliseconds
            milliseconds = timeElapsed + prev_milliseconds;
            if (milliseconds > 1000) milliseconds %= 1000;

            // set the stopwatch
            setStopwatch(hours, minutes, seconds, milliseconds);
        }, 25); // update time in stopwatch after every 25ms
    }

    function lapSplit(
        prev_hours,
        prev_minutes,
        prev_seconds,
        prev_milliseconds
    ) {
        var lapTime = new Date(); // fetch current time

        lapUpdate = setInterval(function() {
            var timeElapsed = new Date().getTime() - lapTime.getTime(); // calculate the time elapsed in milliseconds

            // calculate hours
            hours = parseInt(timeElapsed / 1000 / 60 / 60) + prev_hours;

            // calculate minutes
            minutes = parseInt(timeElapsed / 1000 / 60) + prev_minutes;
            if (minutes > 60) minutes %= 60;

            // calculate seconds
            seconds = parseInt(timeElapsed / 1000) + prev_seconds;
            if (seconds > 60) seconds %= 60;

            // calculate milliseconds
            milliseconds = timeElapsed + prev_milliseconds;
            if (milliseconds > 1000) milliseconds %= 1000;

            // set the stopwatch
            setLapWatch(hours, minutes, seconds, milliseconds);
        }, 25); // update time in stopwatch after every 25ms
    }

    // Set the time in stopwatch
    function setStopwatch(hours, minutes, seconds, milliseconds) {
        $("#hours").html(prependZero(hours, 2));
        $("#minutes").html(prependZero(minutes, 2));
        $("#seconds").html(prependZero(seconds, 2));
        $("#milliseconds").html(prependZero(milliseconds, 3));
    }
    // set time in lap watch
    function setLapWatch(hours, minutes, seconds, milliseconds) {
        $("#lapHours").html(prependZero(hours, 2));
        $("#lapMinutes").html(prependZero(minutes, 2));
        $("#lapSeconds").html(prependZero(seconds, 2));
        $("#lapMilliseconds").html(prependZero(milliseconds, 3));
    }

    // Prepend zeros to the digits in stopwatch
    function prependZero(time, length) {
        time = new String(time); // stringify time
        return (
            new Array(Math.max(length - time.length + 1, 0)).join("0") + time
        );
    }
    // populate split fields
    const lapInterval = ( i ) => {
        // lets get current time integers as variables
        let splitHours = parseInt($("#lapHours").html());
        let splitMinutes = parseInt($("#lapMinutes").html());
        let splitSeconds = parseInt($("#lapSeconds").html());

        // plug values into input
        $(`#split_${i}`).val(`${splitHours}:${splitMinutes}:${splitSeconds}`);

        return ++i;
    };
/*--------------------------------------------------------------------------*/
/**
 * 
 * DATE INPUT FORMATTER FUNCTION
 * ------------------------------------------------------------------------ *
 * Designed to operate the time inputs on batch extraction submission form.
 * Two seperate clocks will be running, one with 'lap' split functionality 
 * to track each step of the batch submission process.
 * ------------------------------------------------------------------------ *
 * 
 */
    // First, we need to add an event handler to check if the field is edited
    dateFormat = ( x ) => {
        $(`${x}`).change(function() {
            if ( $(this).length === 2 ) {
                $(this).concat('-'); 
            }
        });
    }
    window.dateFormat(`#dateFilled`);


}); // end ready function
