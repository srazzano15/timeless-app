<template>
	<v-content>
		<v-container class="d-flex justify-c">
			<v-card max-width="800" class="text-xs-center elevation-4">
				<v-card-title primary-title class="display-2 justify-c"
					>Welcome to Timeless Batch Master</v-card-title
				>
				<v-card-text>
					Please use your Timeless email address and password to login.
				</v-card-text>

				<v-divider></v-divider>

				<v-card-actions class="justify-c">
					<v-btn
						large
						color="primary"
						class="black--text my-2 mr-2"
						href="/login"
						>Login</v-btn
					>

					<v-btn
						large
						color="primary"
						class="black--text my-2 ml-2"
						href="/register"
						>Register</v-btn
					>
				</v-card-actions>
			</v-card>
		</v-container>
	</v-content>
</template>

<script>
	export default {};
</script>


