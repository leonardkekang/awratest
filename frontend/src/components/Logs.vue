<template>
  <div class="container pt-3 pb-5">
    <h2 class="text-left">Activity Logs</h2>

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
        </b-row>

        <b-row class="pb-3">
          <b-col>
            <b-table
              striped
              hover
              :items="items"
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
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      items: [],
      //fields: ["ip", "label", "actions"],
      filter: "",
      currentPage: 1,
      perPage: 4,
    };
  },
  computed: {
    rows() {
      return this.items.length;
    },
    fields() {
      return [
        {
          key: "table",
          label: "Module",
        },
        {
          key: "action",
          label: "Action",
        },
        {
          key: "old_value",
          label: "Old Value",
          formatter: (value, key, item) => {
              var val = item.new_value;
              if (item.new_value == null) {
                  var val = 'NULL';
              }
              return val;
          }
        },
        {
          key: "new_value",
          label: "New Value",
          formatter: (value, key, item) => {
              var val = item.new_value;
              if (item.new_value == null) {
                  var val = 'NULL';
              }
              return val;
          }
        },
        {
          key: "created_by",
          label: "Created",
          formatter: (value, key, item) => {
              var user = item.created_by.name;
              var date = new Date(item.created_at).toDateString();
              var time = new Date(item.created_at).toLocaleTimeString();
              return user + ' ' + date + ' ' + time;
          }
        },
        {
          key: "updated_by",
          label: "Updated",
          formatter: (value, key, item) => {
              var user = '';
              if (item.updated_by != null) {
                  var user = item.updated_by.name;
              }
              var date = new Date(item.updated_at).toDateString();
              var time = new Date(item.updated_at).toLocaleTimeString();
              return user + ' ' + date + ' ' + time;
          }
        }
      ];
    },
  },
  methods: {
    getLogs: function () {
      axios({
        url: "http://sandboxapi.my.id/api/logs",
        method: "GET",
        headers: {
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
      }).then((resp) => {
        this.items = resp.data.data;
      });
    },
  },
  mounted() {
    this.getLogs();
  },
};
</script>
