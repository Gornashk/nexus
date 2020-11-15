<template>
  <div class="signupBar">
    <div class="signupInner" v-show="!subscribed">
      <p>Be Connected &#183; Be Linked &#183; Be Calm and receive news, tips, trends, tidbits and resources.<br/>
      The newsletter is free and sent directly to your email inbox.</p>
      <form>
        <input type="email" name="emailaddress" placeholder="Your email" 
        :class="{ error: subscribeError }"
        v-model="email">
        <input type="submit" value="Subscribe" @click.prevent="subscribeToNews">
      </form>
      <p class="error" v-show="subscribeError" v-html="subscribeErrorMessage"></p>
    </div>
    <div v-show="subscribed">
      <h2>Thank You</h2>
      <p>
        <span>
          You are now subscribed to our newsletter. It's as simple
          as that.
        </span>
      </p>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

module.exports = {
  data() {
    return {
      themeDir: themeDir,
      siteurl: siteurl,
      email: "",
      loading: false,
      subscribed: false,
      subscribeError: false,
      subscribeErrorMessage: ""
    }
  },
  mounted() {
    
  },
  methods: {
    subscribeToNews() {
      this.loading = true;
      axios
      .post(this.siteurl + "/wp-json/crafted/v1/subscribe", {
        email: this.email,
        FNAME: "",
        LNAME: "",
        list_id: "357f278d97"
      })
      .then(
        function(response) {
          const result = JSON.parse(response.data.body);
          console.log(result);
          if (
            result.status === "subscribed" ||
            result.title === "Member Exists"
          ) {
            this.loading = false;
            this.subscribed = true;
          } else {
            this.subscribeError = true,
            this.subscribeErrorMessage = 'There was an unhandled error in trying to subscribe your email';
            this.loading = false;
            this.subscribed = false;
          }
        }.bind(this)
      )
      .catch(function(error) {
        console.log(error);
        this.subscribeError = true;
        this.subscribeErrorMessage = 'There was an unhandled error in trying to subscribe your email';
        this.loading = false;
        this.subscribed = false;
      }.bind(this)
      );

    }
  }
}
</script>

<style lang="scss">
@import "../../scss/variables.scss";
@import "../../scss/mixins.scss";

.signupBar {
  font-size: 16px;
  width: 70%;
  margin: 0 0 0 auto;
  color: $white;

  .signupInner {
    text-align: left;
  }

  @include breakpoint(forTabletPortraitDown) {
    margin: 0 auto;
    width: 90%;
  }

  h2 {
    margin-bottom: .75em;

    @include breakpoint(forPhoneOnly) {
      font-size: 2.5em;
    }
  }

  p {
    margin-bottom: 0;
    @include breakpoint(forPhoneOnly) {
      font-size: 1.3em;
    }
    &.error {
      margin-bottom: 0;
    }
  }

  form {
    
    max-width: 640px;
    margin: 0;
    display: flex;
    justify-content: center;

    @include breakpoint(forPhoneOnly) {
      flex-wrap: wrap;
    }

    input[type="email"] {
      flex: 1 1 auto;
      color: $white;
      display: block;
      background: none;
      border-left: 2px solid $white;
      border-top: 2px solid $white;
      border-bottom: 2px solid $white;
      border-right: none;
      font-size: 1em;
      padding: 1.2em;
      box-sizing: border-box;

      @include breakpoint(forPhoneOnly) {
        border-right: 2px solid $white;
      }

      &.error {
        border-color: $red;
      }
      &::-webkit-input-placeholder { /* Chrome/Opera/Safari */
        color: $white;
      }
      &::-moz-placeholder { /* Firefox 19+ */
        color: $white;
      }
      &:-ms-input-placeholder { /* IE 10+ */
        color: $white;
      }
      &:-moz-placeholder { /* Firefox 18- */
        color: $white;
      }
    }
    input[type="submit"] {
      background: $green;
      color: $white;
      border: none;
      font-size: 1em;
      padding: 1.2em;
      border: 2px solid $white;
      @include transition(all .2s ease-in-out);

      @include breakpoint(forPhoneOnly) {
        flex: 1 1 auto;
      }

      &:hover,
      &:active,
      &:focus {
        background: $white;
        color: $green;
      }
    }
  }

}

</style>