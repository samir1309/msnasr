<script>
    new Vue({
        el: '#shop68',
        data: function () {
            return {
                //Cart
                cartItems: [],
                cartSumPrice: 0,
                quantity: 1,
                specificationId:'',
                countShopping: 0,
                discountCode: "",
                order : null,
                //
                products : [],
                selected2 : [],
                selected3 : [],
                selected4 : [],
                loading2 : false,
				 productsListAwait :0,
                msg:'hhhhh',
                brands : [],
                categories : [],
                // brandSearch : [],
                catSearch : [],
                searchValue : '',

                // selectedPost : '',
                // selectedPost2 : '',
                available : false,
                discount : false,
                timer : false,
                cartTotal: 0,
                changePost1:'',
                countProduct:0,

                // selectedColor : '',
                selectedColor2 : '',
                sortBy: '',
                page:1,








                selectedState:'',
                selectedCity: '',


      
                cities: [],
            }
        },
        methods: {
            hideShortDes(){
                document.getElementById('textShortDes').style.display = 'none';
            },
            closeMe(){
                $('#adressModalmain').modal('hide');
            },
            plusQnty(cartItemId){
                this.cartItems.find( ({ id }) => id === cartItemId ).productQuantity =  this.cartItems.find( ({ id }) => id === cartItemId ).productQuantity+1;
            },
            minusQnty(cartItemId){
                this.cartItems.find( ({ id }) => id === cartItemId ).productQuantity =  this.cartItems.find( ({ id }) => id === cartItemId ).productQuantity-1;

            },
            changeColor:function(colorSelected,price,oldprice,realPrice){
                this.selectedColor2 = colorSelected+'|'+price+'|'+oldprice+'|'+realPrice;
            },

            changePrice:function(price){
                this.selectedPrice = price + " تومان ";
            },

            changePost:function(postPrice,payment){
                console.log('eeeeee');
                this.selectedPost = postPrice;
                this.selectedPost2 = payment;
                // this.cartPayment = this.cartPayment + this.selectedPost2;
            },
            //Address
            getCities:function ()  {
                var vm = this;


                axios.post(`{{route('panel.set-city')}}`, {
                    body: {}
                })
                    .then(response => {
                        if (response.data.success === true) {
                            vm.cities = response.data.cities;
                        }
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            setCities:function ()  {

                var vm = this;

                axios.post(`{{route('panel.set-city')}}`, {
                    body: {  state_id: this.selectedState }
                })
                    .then(response => {
                        if (response.data.success === true) {
                            vm.cities = [];
                            vm.cities = response.data.cities;
                        }
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            getEditCities:function (selectedState)  {
                var vm = this;


                axios.post(`{{route('panel.set-city-edit')}}`, {
                    body: {
                        state_id: selectedState
                    }
                })
                    .then(response => {
                        if (response.data.success === true) {
                            vm.cities = response.data.cities;
                        }
                    })
                    .catch(e => {
                        console.log(e);
                    });

            },
          
            
    //ProductList
            searchInBrands(){

                this.brandSearch =  this.brands.filter((brand) => {
                    return brand.title.toLowerCase().includes(this.searchValue.toLowerCase());
                });

            },
            searchInCats(){
                this.catSearch =  this.categories.filter((category) => {
                    return category.title.toLowerCase().includes(this.searchValue.toLowerCase());
                });

            },
            getBrands:function ()  {
                var vm = this;
                axios({
                    method: "post",
                    url: '{{route('site.getbrands')}}',
                    data: {
                        category_id: {{@$category->id ? @$category->id : '1'}},
                    }
                }).then(response => {
                    if (response.data.success === true) {
                        vm.brands = response.data.brands;
                       //  vm.brandSearch = response.data.brands;
                    }
                }).catch(e => {
                    console.log(e);
                });
            },
            getCats:function ()  {

                var vm = this;
                axios({
                    method: "post",
                    url: '{{route('site.getcats')}}',
                    data: {
                        brand_id: {{@$brand->id ? @$brand->id : '1'}},
                    }
                }).then(response => {
                    vm.catSearch = [];
                    vm.categories = response.data.categories;
                    vm.catSearch = response.data.categories;
                    vm.catSearch =  vm.categories;

                }).catch(e => {
                    console.log(e);
                });


                console.log(vm.catSearch);


            },
              getProductAxios(){
                var vm = this;
                vm.loading2 = true;
                axios({
                    method: "post",
                    url: '{{route('vue.product-list')}}',
                    data: {
                        category_id: {{@$category->id ? @$category->id : '1'}},
                        page:vm.page,
                    }
                }).then(function (response) {
                    vm.products = [...vm.products,...response.data.products];
                    vm.loading2 = false;
                    if(vm.page == response.data.pageCount){
                        vm.stopCall = true;
                    }

                    vm.page = vm.page+1;
                });
            },
            productList() {

                var vm = this;
                if(vm.page == 1){
                    this.getProductAxios();
                }
                setInterval(function () {

                    if(vm.stopCall === false){
                        if(vm.loading2 == false){
                            vm.getProductAxios();
                        }
                    }else if(vm.stopCall2 === true){
                        vm.loading2 = false;
                    }

                }, 2000);
            },
			
			 async filterProductsAxios(vm)  {
                vm.loadingMine = true;

                const response = await axios({
                    method: "post",
                    url: '{{route('vue.filter-product')}}',
                    data: {
                        category_id: {{@$category->id ? @$category->id : '1'}},
                        specification : this.selected2,
                        brand : this.selected3,
                        available : this.available,
                        discount : this.discount,
                        timer : this.timer,
                        sortBy : this.sortBy,
                        priceRange : document.getElementById('amount').value,
                        page : vm.page2,
                    }
                });

                vm.products = [...vm.products,...response.data.products];

                //
                if(response){
                    if(vm.page2 == response.data.fCount){
                        vm.stopCall2 = true;
                        vm.loading2 = false;
                    }
                    vm.page2 = vm.page2+1;
                    vm.loadingMine = false;
                }


            },

      
            async filterProductsAxios(vm)  {
                vm.loadingMine = true;

                const response = await axios({
                    method: "post",
                    url: '{{route('vue.filter-product')}}',
                    data: {
                        category_id: {{@$category->id ? @$category->id : '1'}},
                        specification : this.selected2,
                        brand : this.selected3,
                        available : this.available,
                        discount : this.discount,
                        timer : this.timer,
                        sortBy : this.sortBy,
                        priceRange : document.getElementById('amount').value,
                        page : vm.page2,
                    }
                });

                vm.products = [...vm.products,...response.data.products];

                //
                if(response){
                    if(vm.page2 == response.data.fCount){
                        vm.stopCall2 = true;
                        vm.loading2 = false;
                    }
                    vm.page2 = vm.page2+1;
                    vm.loadingMine = false;
                }


            },

            filterProducts:function ()  {
                var vm = this;
                vm.loading2 = true;
                vm.products = [];
                vm.stopCall = true;
                vm.stopCall2 = false;
                vm.page2 = 1;
                this.filterProductsAxios(vm);
                setInterval(function () {
                    if(vm.page2 > 1) {
                        if (vm.loadingMine === false && vm.stopCall2 == false) {
                            vm.filterProductsAxios(vm);
                        }
                    }
                }, 5000);
            },


      brandList:function ()  {

                var vm=this;
                axios({
                    method: "post",
                    url: '{{route('vue.brand-list')}}',
                    data: {
                        brand_id: {{@$brand->id ? @$brand->id : '1'}},
                    }
                }).then(function (response) {
                    vm.products = [];
                    vm.products = response.data.products;
                    vm.loading2 = false;
                });
            },
            filterBrands:function ()  {
                var vm=this;
                this.loading2 = true;
                axios({
                    method: "post",
                    url: '{{route('vue.filter-brand')}}',
                    data: {
                        brand_id: {{@$brand->id ? @$brand->id : '1'}},
                        category : this.selected4,
                        available : this.available,
                        discount : this.discount,
                        sortBy : this.sortBy,
                        // priceRange : document.getElementById('amount').value

                    }
                }).then(function (response) {
                    vm.products = [];

                    vm.products = response.data.products;

                    vm.loading2 = false;

                });
            },


            //Cart
            getCartItems() {
                var vm = this;
                axios({
                    method: "post",
                    url: '{{route('site.cart.content')}}',
                    data: {}
                }).then(function (response) {
                    if (response.data.success) {
                        if (response.data.success === true) {
                            vm.cartItems = [];
                            vm.cartItems = response.data.cart;

                            vm.cartSumPrice = 0;
                            vm.cartSumPrice = response.data.cartSumPrice;
                            vm.order = null;
                            vm.order = response.data.order;
                            vm.countShopping = 0;
                            vm.countShopping = response.data.countShopping;
                            vm.cartPayment = 0;
                            vm.cartPayment = response.data.cartPayment;
                            vm.cartTotal = 0;
                            vm.cartTotal = response.data.totalCount;

                        }
                    }
                });
            },
            addToCart(productId, quantity, relativeMode, specificationId) {

                var vm = this;

                console.log(vm.quantity2);
                axios({
                    method: "post",
                    url: '{{route('site.cart.add')}}',
                    data: {
                        // discount_code: this.discountCode,
                        productId: productId,
                        specificationId: specificationId,
                        // discountId: discountId,

                        quantity: document.getElementById("quantity").value ,


                        relativeMode: relativeMode
                    }
                }).then(function (response) {
                    if (response.data.success === true ) {
                        vm.cartItems = [];
                        vm.cartItems = response.data.cart;
                        vm.cartSumPrice = 0;
                        vm.cartSumPrice = response.data.cartSumPrice;
                        vm.countShopping = 0;
                        vm.countShopping = response.data.countShopping;
                        vm.cartPayment = 0;
                        vm.cartPayment = response.data.cartPayment;
                        vm.cartTotal = 0;
                        vm.cartTotal = response.data.totalCount;

                        swal("اضافه شد!", response.data.message, "success", {
                            buttons: {
                                continiue:{
                                    text: "تکمیل سفارش و پرداخت",
                                    color: 'red',
                                },
                                nonow: "ادامه خرید",
                            },
                        }).then((value) => {
                            switch (value) {

                                case "continiue":

                                    window.location.href = '{{url('/checkout')}}'; //Will take you to Google.
                                    break;

                                case "nonow":
                                    console.log('hi');
                                    break;

                                default:
                                    console.log('hi');
                            }
                        });
                    }

                    if (response.data.success === false && response.data.button == true) {
                        swal(
                            {title: "خطا!",
                                text: response.data.message,
                                icon: "error",
                                button: "ثبت نام/ورود"})
                            .then(() => {
                                location.href = "{{url('panel/login?product_id='.@$product->id)}}";
                            });
                    }

                    if(response.data.success === false && response.data.button == false) {

                        swal("خطا!", response.data.message, "error");


                    }

                });
            },
            addDiscount() {
                var vm = this;

                axios({
                    method: "post",
                    url: '{{route('site.discount.add')}}',
                    data: {

                        code: this.discountCode,
                    }
                }).then(function (response) {
                    if (response.data.success === true) {
                        vm.cartItems = [];
                        vm.cartItems = response.data.cart;
                        vm.cartSumPrice = 0;
                        vm.cartSumPrice = response.data.cartSumPrice;
                        vm.countShopping = 0;
                        vm.countShopping = response.data.countShopping;
                        vm.cartPayment = 0;
                        vm.cartPayment = response.data.cartPayment;

                    } else {



                    }

                });
            },
            removeCart(productId) {
                var vm = this;
                axios({
                    method: "post",
                    url: '{{route('site.cart.remove')}}',
                    data: {
                        productId: productId
                    }
                }).then(function (response) {
                    if (response.data.success === true) {
                        vm.cartItems = [];
                        vm.cartItems = response.data.cart;
                        vm.cartSumPrice = 0;
                        vm.cartSumPrice = response.data.cartSumPrice;
                        vm.countShopping = 0;
                        vm.countShopping = response.data.countShopping;
                        vm.cartPayment = 0;
                        vm.cartPayment = response.data.cartPayment;
                        vm.cartTotal = 0;
                        vm.cartTotal = response.data.totalCount;

                        swal("محصول حذف شد!", "محصول از سبد خرید شما حذف شد", "success");
                    }
                });
            },
    

            //Like
         

        },
        computed: {


            selectedPost: function () {

                if(this.changePost1){
                    return this.changePost1.split("|")[2];
                }else{
                    return 'روش ارسال را انتخاب کنید';
                }
            },
            brandSearch: function () {
                console.log(this.searchValue);
                if(this.searchValue !== ''){
                    return this.brands.filter((brand) => {
                        return brand.title.toLowerCase().includes(this.searchValue.toLowerCase());
                    });
                }else{
                    return this.brands;
                }
            },
            selectedPost2: function () {
                if(this.changePost1){
                    return parseInt(this.changePost1.split("|")[1]);
                }else{
                    return 0;
                }
            },
            changePost2: function () {
                if(this.changePost1 !== ''){
                    return parseInt(this.changePost1.split("|")[0]);
                }else{
                    return null;
                }
            },

            cartPaymentTotal: function () {
                return this.cartPayment + this.selectedPost2;
            },
            selectedColor: function () {
                return this.selectedColor2.split("|")[0];
            },
            selectedPrice: function () {
                if(this.selectedColor2){
                    let myprice =  this.selectedColor2.split("|")[1];
                    var x = (parseInt(myprice)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                    return x.replace('.0','') + ' تومان ';
                }else{
                    return '{!! @$product->price_first["price"] !!}';
                }
            },
            selectedRealPrice: function () {
                if(this.selectedColor2){
                    let myprice =  this.selectedColor2.split("|")[3];
                    var x = (parseInt(myprice)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                    return x.replace('.0','') + ' تومان ';
                }else{
                    return '{!! @$product->price_first["old"] !!}';
                }
            },
            selectedStock: function () {
                if(this.selectedColor2){
                    let myprice =  this.selectedColor2.split("|")[2];
                    return myprice;
                }else{
                    return '{{@$product->stock_count}}';
                }
            },
            countShopping: function () {
                return this.cartItems.length;
            },

            sortedProducts: function() {

                return this.products;
            }
        },

         mounted() {
            this.loading2 = true;
            this.getCartItems();
            @if(@Request::segments()[0] == "discount")
                this.productsDis();
            @endif

                @if(@Request::segments()[0] == "cat")

                this.productList();

            this.getBrands();
            @endif
                @if(@Request::segments()[0] == "brand")

                this.BrandList();
            this.getCats();
            @endif
                this.getEditCities(null);
        },
        watch : {
            selectedColor2:function(val) {

                $( "#v-pills-"+val.split("|")[0]+"-tab").trigger("click");

            }
        }
    });
</script>
