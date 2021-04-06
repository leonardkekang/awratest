# AWRA Coding Test

You can check the uploaded API on http://sandboxapi.my.id/

## The Stacks
| Database Engine | PHP Framework | Token Authentication |
|-----------------|---------------|----------------------|
| MariaDB         | Lumen         | JWT Bearer Token     |

## Build Setup
``` bash
# enter lumen directory
cd lumen

# install dependencies
composer install

# migrate the database (don't forget to make and edit .env file based on .env.example)
php artisan migrate

# serve
php -S localhost:8000
```

## Endpoints

### POST
``` bash
api/register
```

*Register new user*. Live URL : http://sandboxapi.my.id/api/register

### Header Parameters
| Key | Value |
|-----|-------|
| Content-Type | application/x-www-form-urlencoded |

### Body Parameters
| Name | Type | Required |
|------|------|-------|
| name | String | true |
| email | String | true |
| password | String | true |

---

### POST
``` bash
api/login
```

*User login*. Live URL : http://sandboxapi.my.id/api/login

### Header Parameters
| Key | Value |
|-----|-------|
| Content-Type | application/x-www-form-urlencoded |

### Body Parameters
| Name | Type | Required |
|------|------|-------|
| email | String | true |
| password | String | true |

---

### POST
``` bash
api/networks
```

*Add new IP record*. Live URL : http://sandboxapi.my.id/api/networks

### Header Parameters
| Key | Value |
|-----|-------|
| Authorization | Bearer [TOKEN] |
| Content-Type | application/x-www-form-urlencoded |

### Body Parameters
| Name | Type | Required |
|------|------|-------|
| ip | String | true |
| label | String | true |

---

### GET
``` bash
api/networks
```

*List IP records*. Live URL : http://sandboxapi.my.id/api/networks

### Header Parameters
| Key | Value |
|-----|-------|
| Authorization | Bearer [TOKEN] |

### Returned Values
| Field | Type | Name |
|------|------|-------|
| id | Integer | Record's ID |
| ip | String | IP Address |
| label | String | IP's Label |
| last_log | Integer | Last Log ID |

### GET
``` bash
api/logs
```

*List Logs records*. Live URL : http://sandboxapi.my.id/api/logs

### Header Parameters
| Key | Value |
|-----|-------|
| Authorization | Bearer [TOKEN] |

### Returned Values
| Field | Type | Name |
|------|------|-------|
| id | Integer | Record's ID |
| table | String | Affected table/module |
| action | Enum | login/store/edit/delete |
| old_value | String | Value before / Initial value |
| new_value | String | Value after |
| created_by | Integer | User's ID |
| updated_by | Integer | User's ID |
| created_at | Timestamp | Record Created on |
| updated_at | Timestamp | Recored Updated on |

### GET
``` bash
api/logs/$id
```

*Get invidual Logs records*. Live URL : http://sandboxapi.my.id/api/logs/$id

### Header Parameters
| Key | Value |
|-----|-------|
| Authorization | Bearer [TOKEN] |

### Returned Values
| Field | Type | Name |
|------|------|-------|
| id | Integer | Record's ID |
| table | String | Affected table/module |
| action | Enum | login/store/edit/delete |
| old_value | String | Value before / Initial value |
| new_value | String | Value after |
| created_by | Integer | User's ID |
| updated_by | Integer | User's ID |
| created_at | Timestamp | Record Created on |
| updated_at | Timestamp | Recored Updated on |
