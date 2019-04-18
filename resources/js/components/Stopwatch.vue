<template>
  <div>
    {{ totalTime }}
    <button @click="timer">{{btnText}}</button>
    <button @click="split">Split</button>
    <br>
    <ul>
        <li v-for="(split, index) in splits" :key="index">
            {{split.format('HH:mm:ss')}}
        </li>
    </ul>
  </div>
</template>

<script>
import moment from "moment";

export default {
  /* data() {
        return {
            start: moment().hours(0).minutes(0).seconds(0),
            seconds: 0,
            minutes: 0,
            hours: 0
        }
    },
    methods: {
        updateTime() {
            const self = this
            setInterval(() => {
                if (self.seconds === 59 && self.minutes === 59) {
                    self.seconds = 0
                    self.minutes = 0
                    self.hours++
                } else if (self.seconds === 59) {
                    self.seconds = 0
                    self.minutes++
                } else {
                    self.seconds++
                }
            }, 1000)
        }
    },
    computed: {
        totalTime() {
            let total = this.start
            total
                .hours(this.hours)
                .minutes(this.minutes)
                .seconds(this.seconds)

            return total.format('HH:mm:ss')
        }
    } */
  data() {
    return {
      start: moment()
        .hours(0)
        .minutes(0)
        .seconds(0),
      seconds: 0,
      minutes: 0,
      hours: 0,
      splits: [

      ],
      btnText: "Start Time",
      timeStarted: false,
      duration: moment()
        .hours(0)
        .minutes(0)
        .seconds(0)
    }
  },
  methods: {
    timer() {
      // establish that the time has started
      this.timeStarted = true;

      // make closure to keep var scope consistent
      const self = this;

      const updateTime = () => {
        if (self.seconds === 59 && self.minutes === 59) {
          self.seconds = 0;
          self.minutes = 0;
          self.hours++;
        } else if (self.seconds === 59) {
          self.seconds = 0;
          self.minutes++;
        } else {
          self.seconds++;
        }
      };

      // start and stop the timer
      if (this.btnText === "Start Time") {
        this.btnText = "Pause";
        this.interval = setInterval(updateTime, 1000);
      } else if (this.btnText === "Pause") {
        this.btnText = "Resume";
        clearInterval(this.interval);
      } else if (this.btnText === "Resume") {
        this.btnText = "Pause";
        this.interval = setInterval(updateTime, 1000);
      }
    },
    split() {
        let dur = this.duration.milliseconds(0)
        let total = this.start
        let split
        let diff = moment()

        split = moment.duration(total.diff(dur))
        let m = split.as('minutes')
        let s = split.as('seconds')
        let h = split.as('hours')
        diff
            .hours(h)
            .minutes(m)
            .seconds(s)
        this.splits.push(diff)
        dur
            .hours(this.hours)
            .minutes(this.minutes)
            .seconds(this.seconds)


    }
  },

  computed: {
    totalTime() {
      let total = this.start;
      total
        .hours(this.hours)
        .minutes(this.minutes)
        .seconds(this.seconds);
      return total.format("HH:mm:ss");
    }
  }
};
</script>

<style>
</style>
