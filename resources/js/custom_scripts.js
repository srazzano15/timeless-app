$(function() {

// check to make sure shit is working
testFunction = () => {console.log(`This shit works 2!`)};
window.testFunction();


/**
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

        // if the 4 split fields are set...
        if (i > 3) {
            total_hours = parseInt($("#hours").html());
            total_minutes = parseInt($("#minutes").html());
            total_seconds = parseInt($("#seconds").html());

            // parse the total time and set value of total_time
            $(`#total_time`)
                .val(`${total_hours}:${total_minutes}:${total_seconds}`)
                .css('background-color', 'var(--success)');

            // pause the clock as to signify an end to timing
            clearInterval(timeUpdate);

            // disable the timing buttons
            $(`#controls button`).prop(`disabled`, true);

        } else {

        // lets get current time integers as variables
        let splitHours = parseInt($("#lapHours").html());
        let splitMinutes = parseInt($("#lapMinutes").html());
        let splitSeconds = parseInt($("#lapSeconds").html());

        // plug value into split_[i]
        $(`#split_${i}`)
            .val(`${splitHours}:${splitMinutes}:${splitSeconds}`)
            .css('background-color', 'var(--success)');

        return ++i;
        }
    };
/*--------------------------------------------------------------------------*/

/**
 *
 * Automatic Weight Add FUNCTION
 * ------------------------------------------------------------------------ *
 * Will add total value to weight field as weights get entered.
 * ------------------------------------------------------------------------ *
 *
 */

    weightCalculator = ( field, sumField ) => {

        // set total value variable and set param for input column array
        let total = 0;
        let bagsArray = field;

        // on the change of a field value from that array
        // parse the input value and add the total to the
        // current total value var
        $(bagsArray).change(function() {

            value = parseFloat($(this).val());
            total = total += value;

            // set the value of the 'total' field to be
            // the new value
            $(sumField).val(total);
        });

    }

    weightCalculator(`.flower_weight`, `#totalFlowerWeight`);
    weightCalculator(`.pillow_weight`, `#totalBatchWeight`);


/**
 *
 * ADD / REMOVE ROW FUNCTIONS
 * ------------------------------------------------------------------------ *
 * On extraction blade, form rows will be able to be added and removed
 * dynamically per need of the user submitting batch
 * ------------------------------------------------------------------------ *
 *
 */
    dynamicRows = ( add, rmv, tbl, i) => {
        i = 8

        $(add).click(function() {

                if (i > -1) {

                    $(`div[name="${tbl}[${i}]"]`).removeAttr(`hidden`);

                    return --i;
                }
        });

        $(rmv).click(function() {

            if (i < 8) {
                i++;

                $(`div[name="${tbl}[${i}]"]`).attr(`hidden`, true);

                return i;
            }
        });

    }

    dynamicRows( `#addRow`, `#rmvRow`, `row` );
    dynamicRows( `#addPillow`, `#rmvPillow`, `pillow` );

/**
 * Beginning of Admin Panel scripts
 */
    $('#selectAllBoxes').click(function(event){

        if(this.checked) {

            $('.checkBoxes').each(function(){

                this.checked = true;

            });

        } else {


            $('.checkBoxes').each(function(){

                this.checked = false;

            });


        }

    });





    /**************** User Profile **********************/



    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();



}); // end ready function
