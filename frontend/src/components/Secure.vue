<template>
  <div class="container pt-3 pb-5">
    <h2 class="text-left">IP Addresses</h2>

    <hr class="pb-4" />

    <b-row col="8" offset="2">
      <b-col>
        <b-row class="pb-3">
          <b-col sm="4">
            <b-form-input
              v-model="filter"
              type="search"
              placeholder="Search"
            ></b-form-input>
          </b-col>
          <b-col sm="4"></b-col>
          <b-col sm="4" align="right">
            <b-button v-b-modal.modal-add variant="success">Add New</b-button>
          </b-col>
        </b-row>

        <b-row class="pb-3">
          <b-col>
            <b-table
              striped
              hover
              :items="posts"
              :fields="fields"
              :filter="filter"
              :per-page="perPage"
              :current-page="currentPage"
            ></b-table>
            <b-pagination
            align="right"
              v-model="currentPage"
              :total-rows="rows"
              :per-page="perPage"
            ></b-pagination>
          </b-col>
        </b-row>
      </b-col>
    </b-row>

    <b-modal id="modal-add" title="Add New IP Address" @show="resetModal" @hidden="resetModal" @ok="handleOk">
      <b-form @submit.stop.prevent="handleSubmit">
        <b-form-group
          id="input-group-1"
          label="IP Address"
          label-for="input-ip"
          label-align="left"
          ><b-form-input
            id="input-ip"
            v-model="form.ip"
            type="text"
            placeholder="i.e: 127.0.0.1"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group
          id="input-group-2"
          label="Label"
          label-for="input-label"
          label-align="left"
          ><b-form-input
            id="input-label"
            v-model="form.label"
            placeholder="Put a Label"
            type="text"
            required
          ></b-form-input>
        </b-form-group>
      </b-form>
    </b-modal>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      form: {
        ip: "",
        label: "",
      },
      posts: [],
      //fields: ["ip", "label", "actions"],
      filter: "",
      currentPage: 1,
      perPage: 4,
    };
  },
  computed: {
    rows() {
      return this.posts.length;
    },
    fields() {
        return [
            {
                key: 'ip',
                label: 'IP'
            },
            'label',
            'actions'
        ];
    }
  },
  methods: {
    getNetworks: function () {
      axios({
        url: "http://sandboxapi.my.id/api/networks",
        method: "GET",
        headers: {
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
      }).then((resp) => {
        this.posts = resp.data.data;
      });
    },
    resetModal: function() {
        this.form.ip = '';
        this.form.label = '';
    },
    handleOk(bvModalEvt) {
        bvModalEvt.preventDefault();
        this.handleSubmit();
    },
    handleSubmit: function () {
      axios({
        url: "http://sandboxapi.my.id/api/networks",
        data: this.form,
        method: "POST",
        headers: {
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
      }).then(() => {
        this.getNetworks();
        this.$nextTick(() => {
          this.$bvModal.hide('modal-add')
        })
      });
    },
  },
  mounted() {
    this.getNetworks();
  },
};
</script>
