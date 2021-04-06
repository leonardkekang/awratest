# AWRA Coding Test

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

# serve
php -S localhost:8000
```

## Endpoints

### POST
``` bash
api/register
```

*Register new user*

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

*User login*

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

*Add new IP record*

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

*List IP records*

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
