<template>
  <v-content>
      <v-container>
          <v-layout 
            align-center 
            justify-center
          >
            <v-flex 
              class="xs12 md6 xl4"
            >
              <v-card 
                justify-center 
                elevation="4"
              >
                <v-toolbar color="background--grey">
                  <v-toolbar-title 
                    class="font-weight-light white--text display-1 justify-c"
                  >Login</v-toolbar-title>
                </v-toolbar>
                <v-card-text>
                  <form id="login-form" aria-label="Login" method="POST" :action="formRoute">

                    <!-- <input type="hidden" name="_token" :value="csrfToken"> -->
                    <slot name="csrf"></slot>
                    <v-layout row wrap>
                      <v-flex xs12>
                        <v-text-field
                          label="Email Address"
                          v-model="input.email"
                          name="email"
                          required
                          autofocus
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs12>
                        <v-text-field
                          label="Password"
                          v-model="input.password"
                          name="password"
                          type="password"
                          required
                          browser-autocomplete
                          placeholder="Password"
                        ></v-text-field>
                      </v-flex>
                      <v-flex 
                        xs12
                      >
                        <v-checkbox
                          v-model="input.remember"
                          label="Remember Me:"
                          color="primary"
                        >
                          
                        </v-checkbox>
                      </v-flex>
                      <v-flex 
                        xs12 md6 xl3
                        class="d-flex"
                      >
                        <v-btn
                          type="submit"

                          class="black--text"
                          color="primary"
                        >Login</v-btn>
                        <v-btn
                          href="/"
                          color="black"
                          flat
                        >Cancel</v-btn>
                      </v-flex>
                    </v-layout>
                  </form>
                </v-card-text>
              </v-card>
            </v-flex>
          </v-layout>
      </v-container>
  </v-content>
</template>

<script>
export default {
  props: ['formRoute'],
  data() {
    return {
      input: {
        email: null,
        password: null,
        remember: true
      },
      
    }
  },
  computed: {
    csrfToken() {
      let token = document.head.querySelector('meta[name="csrf-token"]')
      return token.content
    },
  },
  methods: {
    attemptLogin() {
      axios
        .post('login', {
          email: this.input.email,
          password: this.input.password
        })
        .then(response => {
          console.log(response)
        })
        .catch(e => {
          console.log(e)
        })
    }
  }
}
</script>

<style>

</style>
