<template>
	<div class="p-grid crud-demo">
		<div class="p-col-12">
			<div class="card">
				<Toolbar class="p-mb-4">
					<template slot="left">
						<h3 class="p-text-uppercase">Liste des invités</h3>
					</template>
					<!--
						<template slot="right">
							<Button title="Exporter" icon="pi pi-upload" class="p-button-help" @click="exportCSV($event)"  />
						</template>
					-->
				</Toolbar>

			    <DataTable ref="dt" :value="guests"  class="p-datatable-customers" :rows="10" dataKey="id" :rowHover="true"
                        :filters="filters" :paginator="true"  >
                    <template #header>
                        <div class="table-header">
							<span class="p-input-icon-left">
                                <i class="pi pi-search" />
                                <InputText v-model="filters['global']" placeholder="Global Search" />
                            </span>
						</div>
					</template>
					<template #empty>
                        <span class="text-center">Aucun invité actuellement</span>
					</template>

                    <Column field="fullname" header="Nom & Prénom" :sortable="true">
						<template #body="slotProps">
							{{slotProps.data.fullname}}
						</template>
					</Column>
                    <Column field="email" header="Email" :sortable="true">
						<template #body="slotProps">
							{{slotProps.data.email}}
						</template>
					</Column>
                    <Column field="phone" header="Numéro" :sortable="true">
                        <template #body="slotProps">
							{{slotProps.data.phone}}
						</template>
					</Column>
                    <Column field="presence" header="Présent" :sortable="true">
                        <template #body="slotProps">
							<span v-if="slotProps.data.presence" class="customer-badge status-present"> OUI  </span>
							<span v-else class="customer-badge status-abscent"> NON  </span>
						</template>
					</Column>
                    <Column field="paystatut" header="Statut Payement" :sortable="true">
                        <template #body="slotProps">
							<span v-if="slotProps.data.paystatut==1" class="customer-badge status-paye"> PAYE  </span>
							<span v-else class="customer-badge status-non-paye"> NON PAYE  </span>
						</template>
					</Column>
					<Column field="ticked_id" header="Ticket" :sortable="true">
                        <template #body="slotProps">
							{{slotProps.data.ticked_id}}
						</template>
					</Column>
					<Column>
						<template #body="slotProps">
                            <Button v-if="slotProps.data.presence!=1" title="Marqué présent" icon="pi pi-check" class="p-button-rounded p-button-success p-mr-2" @click="confirmEnableGuest(slotProps.data)" />
							<Button v-else title="Marqué Abscent" icon="pi pi-times" class="p-button-rounded p-button-warning p-mr-2 center" @click="confirmDisableGuest(slotProps.data)" />
						</template>
					</Column>
				</DataTable>

				<Dialog :visible.sync="enable_guest_dialog" :style="{width: '450px'}" header="Confirmation" :modal="true">
					<div class="confirmation-content">
						<i class="pi pi-exclamation-triangle p-mr-3" style="font-size: 2rem" />
						<span v-if="guest">Etes-vous sur de vouloir marqué la présence pour Mr/Mme {{ guest.fullname }}?</span>
					</div>
					<template #footer>
						<Button label="Non" icon="pi pi-times" class="p-button-text" @click="enable_guest_dialog = false"/>
						<Button label="Oui" icon="pi pi-check" class="p-button-text" @click="enableGuest" />
					</template>
				</Dialog>

				<Dialog :visible.sync="disable_guest_dialog" :style="{width: '450px'}" header="Confirmation" :modal="true">
					<div class="confirmation-content">
						<i class="pi pi-exclamation-triangle p-mr-3" style="font-size: 2rem" />
						<span >Etes-vous sur de vouloir marqué l'absence pour {{ guest.fullname }}?</span>
					</div>
					<template #footer>
						<Button label="Non" icon="pi pi-times" class="p-button-text" @click="disable_guest_dialog = false"/>
						<Button label="Oui" icon="pi pi-check" class="p-button-text" @click="disableGuest" />
					</template>
				</Dialog>
			</div>
		</div>
	</div>

</template>

<script>
import { signups, enableGuest, disableGuest } from '@/api/dash.js'

export default {
	data() {
		return {
			guest: {},
			guests: [

			],
			guest_dialog: false,
			enable_guest_dialog: false,
			disable_guest_dialog: false,
			selected_guests: null,
			filters: {},
			submitted: false,
			pagination: {
				offset: 1,
				total_items_count: 100,
				per_page: 10
			}
		}
	},
	created() {
	},
	mounted() {
		signups().then( rep_db => {
					console.log("rep:", rep_db)
					this.guests = rep_db.data
				}).catch( error => {
					console.log("error: ", error)
					//error
				})

    },
	methods: {
		enableGuest() {
			enableGuest(this.guest.id).then( rep_db => {
						console.log("rep:", rep_db)
						this.guests.forEach((item, i) => {
							if(item.id == this.guest.id) {
								item.presence = true
							}
						});
						this.$toast.add({severity:'success', summary: 'Successful', detail: "Présence marqué", life: 3000});
					}).catch( error => {
						console.log("error: ", error)
						this.$toast.add({severity:'success', summary: 'Successful', detail: "Une erreur s'est produite", life: 3000});
					}).then( () => {
						this.enable_guest_dialog = false;
					})
		},
		disableGuest() {
			disableGuest(this.guest.id).then( rep_db => {
						console.log("rep:", rep_db)
						this.guests.forEach((item, i) => {
							if(item.id == this.guest.id) {
								item.presence = false
							}
						});
						this.$toast.add({severity:'success', summary: 'Successful', detail: "Absence marqué", life: 3000});
					}).catch( error => {
						console.log("error: ", error)
						this.$toast.add({severity:'success', summary: 'Successful', detail: "Une erreur s'est produite", life: 3000});
					}).then( () => {
						this.disable_guest_dialog = false;
					})
		},
		confirmEnableGuest(guest) {
			this.guest = {...guest};
			this.enable_guest_dialog = true;
		},
		confirmDisableGuest(guest) {
			this.guest = {...guest};
			this.disable_guest_dialog = true;
		},
		findIndexById(id) {
			let index = -1;
			for (let i = 0; i < this.guests.length; i++) {
				if (this.guests[i].id === id) {
					index = i;
					break;
				}
			}
			return index;
		},
		createId() {
			let id = '';
			var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
			for ( var i = 0; i < 5; i++ ) {
				id += chars.charAt(Math.floor(Math.random() * chars.length));
			}
			return id;
		},
		exportCSV() {
			this.$refs.dt.exportCSV();
		}
	}
}
</script>

<style scoped lang="scss">
.dash_green_color {
    background-color: #08C521;
}
::v-deep .p-datatable.p-datatable-customers {
	.p-datatable-header {
		padding: 1rem;
		text-align: left;
		font-size: 1.5rem;
	}

	.p-paginator {
		padding: 1rem;
	}

	.p-datatable-thead > tr > th {
		text-align: left;
	}

	.p-datatable-tbody > tr > td {
		cursor: auto;
	}

	.p-dropdown-label:not(.p-placeholder) {
		text-transform: uppercase;
	}
}

/* Responsive */
.p-datatable-customers .p-datatable-tbody > tr > td .p-column-title {
	display: none;
}

@media screen and (max-width: 960px) {
    ::v-deep .p-datatable {
		&.p-datatable-customers {
			.p-datatable-thead > tr > th,
			.p-datatable-tfoot > tr > td {
				display: none !important;
			}

			.p-datatable-tbody > tr {
				> td {
					text-align: left;
					display: block;
					border: 0 none !important;
					width: 100% !important;
					float: left;
					clear: left;
					border: 0 none;

					.p-column-title {
						padding: .4rem;
						min-width: 30%;
						display: inline-block;
						margin: -.4rem 1rem -.4rem -.4rem;
						font-weight: bold;
					}

					.p-progressbar {
						margin-top: .5rem;
					}
				}
			}
		}
	}
}
// .................
.p-dialog .product-image {
	width: 150px;
	margin: 0 auto 2rem auto;
	display: block;
}

.confirmation-content {
	display: flex;
	align-items: center;
	justify-content: center;
}
.customer-badge {
	border-radius: 2px;
	padding: .25em .5rem;
	font-weight: 700;
	font-size: 12px;
	letter-spacing: .3px;

	&.status-present {
		background: #C8E6C9;
		color: #256029;
	}

	&.status-paye {
		background: #C8E6C9;
		color: #256029;
	}

	&.status-abscent {
		background: #FFCDD2;
		color: #C63737;
	}

	&.status-non-paye {
		background: #FFCDD2;
		color: #C63737;
	}
}
</style>
