<template> 
	<v-container fluid>
		<v-layout 
			row
			wrap
			class="px-4"
		>
			<v-flex 
				xs6 
				md3
				class="px-2"
			>
				<v-card
					class="elevation-4"
				>
					<v-card-title
						primary-title
						class="black--text headline"
					>Submitted Batches</v-card-title>
					<v-card-text>
						0
					</v-card-text>

					<v-card-actions>
						<v-btn
							color="primary"
							flat
							
						>Expand</v-btn>
					</v-card-actions>
				</v-card>
			</v-flex>

			<v-flex 
				xs6 
				md3
				class="px-2"
			>
				<v-card
					class="elevation-4"
				>
					<v-card-title
						primary-title
						class="black--text headline"
					>Average Disparity</v-card-title>
					<v-card-text>
						0
					</v-card-text>

					<v-card-actions>
						<v-btn
							color="primary"
							flat
						>Expand</v-btn>
					</v-card-actions>
				</v-card>
			</v-flex>

			<v-flex 
				xs6 
				md3
				class="px-2"
			>
				<v-card
					class="elevation-4"
				>
					<v-card-title
						primary-title
						class="black--text headline"
					>Greatest Disparity</v-card-title>
					<v-card-text>
						0
					</v-card-text>

					<v-card-actions>
						<v-btn
							color="primary"
							flat							
						>Expand</v-btn>
					</v-card-actions>
				</v-card>
			</v-flex>

			<v-flex 
				xs6
				md3
				class="px-2"
			>
				<v-card 
					class="elevation-4"
				>
					<v-card-title
						primary-title
						class="black--text headline"
					>Average Run Time</v-card-title>
					<v-card-text>
						0:00
					</v-card-text>

					<v-card-actions>
						<v-btn
							color="primary"
							flat
							
						>Expand</v-btn>
					</v-card-actions>
				</v-card>
			</v-flex>
		</v-layout>
	</v-container>
</template>

<script>
	import axios from "axios";

	export default {
		data() {
			return {};
		}
	};
</script>
