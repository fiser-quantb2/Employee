$(function() {

            // Basic Data
            $("#jsGrid-basic").jsGrid({
                height: "70%",
                width: "100%",
                filtering: true,
                editing: true,
                sorting: true,
                paging: true,
                autoload: true,
                pageSize: 15,
                pageButtonCount: 5,
                deleteConfirm: "Do you really want to delete the client?",
                controller: db,
                fields: [
                    { name: "Name", type: "text", width: 150 },
                    { name: "Age", type: "number", width: 50 },
                    { name: "Address", type: "text", width: 200 },
                    { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
                    { name: "Married", type: "checkbox", title: "Is Married", sorting: false },
                    { type: "control" }
                ]
            });
            // OData Service
            $("#jsGrid-odata").jsGrid({
                height: "auto",
                width: "100%",
                sorting: true,
                paging: false,
                autoload: true,
                controller: {
                    loadData: function() {
                        var d = $.Deferred();
                        $.ajax({
                            url: "http://services.odata.org/V3/(S(3mnweai3qldmghnzfshavfok))/OData/OData.svc/Products",
                            dataType: "json"
                        }).done(function(response) {
                            d.resolve(response.value);
                        });

                        return d.promise();
                    }
                },
                fields: [
                    { name: "Name", type: "text" },
                    { name: "Description", type: "textarea", width: 150 },
                    { name: "Rating", type: "number", width: 50, align: "center",
                        itemTemplate: function(value) {
                            return $("<div>").addClass("rating").append(Array(value + 1).join("&#9733;"));
                        }
                    },
                    { name: "Price", type: "number", width: 50,
                        itemTemplate: function(value) {
                            return value.toFixed(2) + "$"; }
                    }
                ]
            });
            
            // Sorting
            $("#jsGrid-sorting").jsGrid({
                height: "80%",
                width: "100%",
         
                autoload: true,
                selecting: false,
         
                controller: db,
         
                fields: [
                    { name: "Name", type: "text", width: 150 },
                    { name: "Age", type: "number", width: 50 },
                    { name: "Address", type: "text", width: 200 },
                    { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
                    { name: "Married", type: "checkbox", title: "Is Married" }
                ]
            });
         
         
            $("#sortingField").change(function() {
                var field = $(this).val();
                $("#jsGrid-sorting").jsGrid("sort", field);
            });
            
            $("#jsGrid-page").jsGrid({
                height: "70%",
                width: "100%",
                autoload: true,
                paging: true,
                pageLoading: true,
                pageSize: 15,
                pageIndex: 2,
                controller: {
                    loadData: function(filter) {
                        var startIndex = (filter.pageIndex - 1) * filter.pageSize;
                        return {
                            data: db.clients.slice(startIndex, startIndex + filter.pageSize),
                            itemsCount: db.clients.length
                        };
                    }
                },
                fields: [
                    { name: "Name", type: "text", width: 150 },
                    { name: "Age", type: "number", width: 50 },
                    { name: "Address", type: "text", width: 200 },
                    { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
                    { name: "Married", type: "checkbox", title: "Is Married" }
                ]
            });

            $("#pager").on("change", function() {
                var page = parseInt($(this).val(), 10);
                $("#jsGrid-page").jsGrid("openPage", page);
            });
            // Custom View
            $("#jsGrid-custom").jsGrid({
                height: "70%",
                width: "100%",
                filtering: true,
                editing: true,
                sorting: true,
                paging: true,
                autoload: true,
                pageSize: 15,
                pageButtonCount: 5,
                controller: db,
                fields: [
                    { name: "Name", type: "text", width: 150 },
                    { name: "Age", type: "number", width: 50 },
                    { name: "Address", type: "text", width: 200 },
                    { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
                    { name: "Married", type: "checkbox", title: "Is Married", sorting: false },
                    { type: "control", modeSwitchButton: false, editButton: false }
                ]
            });

            $(".config-panel input[type=checkbox]").on("click", function() {
                var $cb = $(this);
                $("#jsGrid-custom").jsGrid("option", $cb.attr("id"), $cb.is(":checked"));
            });
            
         
         
            String.prototype.capitalize = function() {
                return this.charAt(0).toUpperCase() + this.slice(1);
            };
        });