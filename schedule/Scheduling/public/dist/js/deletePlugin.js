
        const deletePlugin = (function () {
            let count = 0
            let title = "Table"
            let url = ""
            let csrf = ""
            // cache the dom
            const $header = $('.ibox-title');
            const $checkbox = $('input[name="checkbox"]')
            const $toggle = $('input[name="checkAll"]')


            // Bind Event Listeners
            const bindFunctions = function () {
                $toggle.on('click', function () {
                    let increment = 0
                    if ($toggle.is(':checked')) {
                        $checkbox.each(function (index, element) {
                            element.checked = true;
                            increment = $('input[name=checkbox]:checked').length;
                        })
                        if (increment > 0) {
                            $header.append(deleteTemplate(increment, url,csrf))
                        }

                    } else {
                        increment = 0;
                        $checkbox.each(function (index, element) {
                            element.checked = false
                        })
                        $header.append(createTemplate(title))
                    }

                })
                $checkbox.on('click', function () {
                    let counter = $('input[name=checkbox]:checked').length;
                    $toggle.each(function (index, element) {

                        element.checked = false
                    })
                    if (counter > 0) {
                        $header.append(deleteTemplate(counter, url,csrf))
                    } else {
                        $header.append(createTemplate(title))
                    }

                })
                $(document).on('submit', '#form-delete', function (e) {
                    var selected = []
                    $('input[name=checkbox]:checked').each(function (index, el) {
                        selected.push(el.value)
                    })
                    $('#testing').val(selected)
                })
            }
            const init = (first, second, third) => {
                url = first;
                title = second;
                csrf = third
                $header.append(createTemplate(title))
                bindFunctions();
            }
            // Delete Template
            const deleteTemplate = (count, url, token) => {

                $header.empty()
                $header.css({
                    'background-color': 'coral',
                })
                return `
                       <h5 style="color: white">${count} selected</h5>
                       <div class="ibox-tools">
                          <form method="post" action="${url}" id="form-delete">
                             ${token}
                               <input type="hidden" name="delete[]" id="testing">
                               <button class="btn btn-default">
                                <i class="fa fa-trash fa-lg"></i>
                           </button>
                          </form>
                          
                       </div>
                      `
            }
            // Create Template
            const createTemplate = (title) => {
                $header.empty()
                $header.css({
                    'background-color': 'white',
                    'color': 'black'
                })
                return `
                       <h5>${title}</h5>
                         <div class="ibox-tools">
                             <button class="btn btn-circle btn-lg" data-toggle="modal" data-target="#create_venue" style="background-color: #8CAEC7;">
                                  <i class="fa fa-plus fa-lg"></i>
                             </button>
                         </div>
                     `
            }
            return {
                init: init
            }
        }()) 