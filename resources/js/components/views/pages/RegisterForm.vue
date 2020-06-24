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
                >Register</v-toolbar-title>
              </v-toolbar>
              <v-card-text>
                <v-form 
                  id="register-form" 
                  method="POST" 
                  :action="formRoute"
                  v-model="valid"
                  ref="form"
                >
                  <slot name="csrf"></slot>
                  
                  <v-layout row wrap>

                    <v-flex xs12>
                      <v-text-field
                        label="Name"
                        v-model="name"
                        name="name"
                        required
                        autofocus
                        validate-on-blur
                        :rules="[rules.required]"
                      ></v-text-field>
                    </v-flex>

                    <v-flex xs12>
                      <v-text-field
                        label="Email Address"
                        v-model="email"
                        name="email"
                        required
                        validate-on-blur
                        placeholder="Email"
                        :rules="[rules.required, rules.valid ]"
                      ></v-text-field>
                    </v-flex>

                    <v-flex xs12>
                      <v-text-field
                        label="Password"
                        v-model="password"
                        name="password"
                        type="password"
                        required
                        browser-autocomplete
                        placeholder="Password"
                        validate-on-blur
                        :rules="[rules.required, rules.len]"
                      ></v-text-field>
                    </v-flex>

                    <v-flex xs12>
                      <v-text-field
                        label="Confirm Password"
                        v-model="confirm"
                        name="password_confirmation"
                        type="password"
                        required
                        browser-autocomplete
                        placeholder="Confirm Password"
                        validate-on-blur
                        :rules="[rules.required, rules.matches]"
                      ></v-text-field>
                    </v-flex>

                    <v-flex xs12>
                      <v-text-field
                        label="Invite Code"
                        v-model="code"
                        name="code"
                        required
                        validate-on-blur
                        :rules="[rules.required, rules.validInvite]"
                      ></v-text-field>
                    </v-flex>

                    <v-flex 
                      xs12 md6 xl3
                      class="d-flex"
                    >
                      <v-btn
                        type="submit"
                        class="black--text"
                        color="primary"
                        :disabled="valid == false"
                      >Register</v-btn>
                      <v-btn
                        href="/"
                        color="black"
                        flat
                      >Cancel</v-btn>
                    </v-flex>
                  </v-layout>
                </v-form>
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
      invites: [],
      name: '',
      email: '',
      password: '',
      confirm: '',
      code: '',
      valid: true,
      rules: {
        required: value => !!value || 'This field is required',
        len: value => (value && value.length >= 8) || 'Password must be at least 8 characters long',
        valid: value => /.+@.+/.test(value) || 'Invalid email, please try again',
        matches: value => value === this.password || 'Your passwords do not match',
        validInvite: value => {
          for (let i = 0; i < this.invites.length; i++) {
            let arr = Object.values(this.invites[i])
            if (!arr.includes(value)) {              
              return 'This code is invalid'
            } 
          }
          return true
        },
      }
    }
  },
  watch: {
    code() {
      this.code = this.code.toString().toUpperCase()
      this.validate()
    }
  },
  methods: {
    validate() {
      this.$refs.form.validate()
    },

    init() {
      axios
        .get('/api/invites')
        .then(r => (this.invites = r.data))
        .catch(e => console.log(e))
    }
  },
  created() {
    this.init()
  }
}
</script>
