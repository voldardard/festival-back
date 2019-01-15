# festival-back

API created with laravel framework to respond to request toa festiva website with a shop.

The front associated is : 
https://github.com/nicrausaz/tip-festival

But every front can match witch this backend.

## Here are the routes used:
### GET Request
**Return all language available by the API**
```
/api/en/lang/available
```

**Return the interface static texts in the language choosen**
```
/api/{local}/lang/interface
```

**Return the info page texts in language choosen**
```
/api/{local}/lang/info
```

**Return all products of the shop in the language choosen**
```
/api/{local}/articles
```

**Return all detail of a product identified by is id in the language choosen**
```
/api/{local}/article/{id}
```

**Return all articles from a category identified by the category id in the language choosen**
```
/api/{local}/category/{id}/articles
```

**Return all info from an order identified the order id and the email in the language choosen**
```
/api/{local}/order/{id}/{email}
```

### PUT Request
**Insert an order with the following template**
```
/api/{local}/order
{
	"name":"Name",
	"fsname":"First name",
	"address":"Street and Nr",
	"npa":0000,
	"city":"City",
	"email":"custommer@domain.com",
	"articles":[
		{"article_id":5,"size_id":3,"quantity":3},
		{"article_id":7,"size_id":6,"quantity":8}],
	"paid":0
}
```

   
