<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>t2</title>
    <style>
        * {
            padding: 0px;
            margin: 0px;
        }

        .active {
            display: block;
        }

        .invisible {
            display: none;
        }

        .para {
            margin-left: 50px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .radio-div {
            margin-left: 35px;
        }

        input[type='radio'] {
            transform: scale(2);
            margin-left: 30px;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        label {
            margin-left: 9px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    {{-- @php
    $para = ['Para 1', 'Para 2', 'Para 3', 'Para 4', 'Para 5', 'Para 6', 'Para 7', 'Para 8'];
    $paragraph = [
    ['PARA 1' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe illo eius sit dolorem magni
    exercitationem optio recusandae unde ea earum. Maxime accusantium cumque assumenda in doloribus blanditiis impedit
    aliquam pariatur eveniet enim vitae, ullam excepturi soluta numquam doloremque
    aperiam quia id incidunt non quo, molestiae quas. Sequi dolore obcaecati perspiciatis.'],
    ['PARA 2' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe illo eius sit dolorem magni
    exercitationem optio recusandae unde ea earum. Maxime accusantium cumque assumenda in doloribus blanditiis impedit
    aliquam pariatur eveniet enim vitae, ullam excepturi soluta numquam doloremque
    aperiam quia id incidunt non quo, molestiae quas. Sequi dolore obcaecati perspiciatis.'],
    ['PARA 3' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe illo eius sit dolorem magni
    exercitationem optio recusandae unde ea earum. Maxime accusantium cumque assumenda in doloribus blanditiis impedit
    aliquam pariatur eveniet enim vitae, ullam excepturi soluta numquam doloremque
    aperiam quia id incidunt non quo, molestiae quas. Sequi dolore obcaecati perspiciatis.'],
    ['PARA 4' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe illo eius sit dolorem magni
    exercitationem optio recusandae unde ea earum. Maxime accusantium cumque assumenda in doloribus blanditiis impedit
    aliquam pariatur eveniet enim vitae, ullam excepturi soluta numquam doloremque
    aperiam quia id incidunt non quo, molestiae quas. Sequi dolore obcaecati perspiciatis.'],
    ['PARA 5' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe illo eius sit dolorem magni
    exercitationem optio recusandae unde ea earum. Maxime accusantium cumque assumenda in doloribus blanditiis impedit
    aliquam pariatur eveniet enim vitae, ullam excepturi soluta numquam doloremque
    aperiam quia id incidunt non quo, molestiae quas. Sequi dolore obcaecati perspiciatis.'],
    ['PARA 6' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe illo eius sit dolorem magni
    exercitationem optio recusandae unde ea earum. Maxime accusantium cumque assumenda in doloribus blanditiis impedit
    aliquam pariatur eveniet enim vitae, ullam excepturi soluta numquam doloremque
    aperiam quia id incidunt non quo, molestiae quas. Sequi dolore obcaecati perspiciatis.'],
    ['PARA 7' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe illo eius sit dolorem magni
    exercitationem optio recusandae unde ea earum. Maxime accusantium cumque assumenda in doloribus blanditiis impedit
    aliquam pariatur eveniet enim vitae, ullam excepturi soluta numquam doloremque
    aperiam quia id incidunt non quo, molestiae quas. Sequi dolore obcaecati perspiciatis.'],
    ['PARA 8' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe illo eius sit dolorem magni
    exercitationem optio recusandae unde ea earum. Maxime accusantium cumque assumenda in doloribus blanditiis impedit
    aliquam pariatur eveniet enim vitae, ullam excepturi soluta numquam doloremque
    aperiam quia id incidunt non quo, molestiae quas. Sequi dolore obcaecati perspiciatis.'],
    ];
    @endphp
    <div class="radio-div">
        @foreach($para as $key => $p)
        <input type="radio" name="radio" class="radioBtn" value="{{ $p }}" id="{{ $key }}" @if ($key==0) checked @endif>
        <label for="{{ $key }}">{{ $p }}</label>
        @endforeach
    </div>
    <div class="para">
        <div class="active">
            <h2>PARA 1</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe illo eius sit dolorem magni
                exercitationem optio recusandae unde ea earum. Maxime accusantium cumque assumenda in doloribus
                blanditiis impedit aliquam pariatur eveniet enim vitae, ullam excepturi soluta numquam doloremque
                aperiam quia id incidunt non quo, molestiae quas. Sequi dolore obcaecati perspiciatis.</p>
        </div>
        @for($i = 0; $i < count($paragraph); $i++) <div class="invisible" id="{{ $i }}">
            @foreach ($paragraph[$i] as $key => $value)
            <h2>{{ $key }}</h2>
            <p>{{ $value }}</p>
            @endforeach
    </div>
    @endfor
    </div> --}}
    {{-- <div class="container d-flex flex-column justify-content-center align-items-center" style="height: 95vh;">
        <div>
            <select name="fabric" id="selectFabric">
                <option value="0">Please Select Fabric</option>
                <option value="1">Fab AA</option>
                <option value="2">Fab BB</option>
                <option value="3">Fab CC</option>
                <option value="4">Fab DD</option>
            </select>
        </div>
        <div class="mt-3">
            <h6>Total: <span>456</span></h6>
        </div>
    </div> --}}
    {{-- <div id="parentFab" class="container d-flex flex-column justify-content-center align-items-center"
        style="height: 95vh;">
        <div>
            <label>How Many Fabric Do you want to Include?</label>
        </div>
        <div class="input-group input-group-sm">
            <input id="fabNumber" class="" type="number">
            <button type="button" class="btn btn-primary more-fabric btn-sm mx-2">Go</button>
        </div>
        <div id="childFab" class="my-2">
            <select name="fabric" id="fab">
                <option value="0">Please Select Fabric</option>
                <option value="1">Fab AA</option>
                <option value="2">Fab BB</option>
                <option value="3">Fab CC</option>
                <option value="4">Fab DD</option>
            </select>
            <input type="text" placeholder="Price" class="mx-2">
        </div>
    </div> --}}
    {{-- <div id="parentFab" class="container d-flex flex-column justify-content-center align-items-center"
        style="height: 95vh;">
        <div>
            <button type="button" class="btn btn-primary more-fabric mx-2">Add More Fabric</button>
        </div>
        <div id="childFab" class="my-2">
            
            <select name="fabric" id="fab">
                <option value="0">Please Select Fabric</option>
                <option value="1">Fab AA</option>
                <option value="2">Fab BB</option>
                <option value="3">Fab CC</option>
                <option value="4">Fab DD</option>
            </select>
            <input type="text" placeholder="Price" class="mx-2">
        </div>
    </div> --}}
    @php
        $money = '8235670';
        $money = number_format($money, 2);
        echo $money;
    @endphp
    <script>
        // const radioDiv = document.querySelector('.radio-div')
        // let para = document.querySelector('.para').children
        // radioDiv.addEventListener('click', (e)=> {
        //     radioId = e.target.getAttribute('id')
        //     for (let i = 0; i < para.length; i++) {
        //         if (para[i].classList.contains('active')) {
        //             para[i].setAttribute('class', 'invisible')
        //         }
        //         if (radioId == para[i].getAttribute('id')) {
        //             para[i].setAttribute('class', 'active')
        //         }
        //     }
        // })

        // const fabric = document.getElementById('selectFabric')
        // const price = {
        //     1: 12, 
        //     2: 5,
        //     3: 4, 
        //     4: 8
        // }
        // fabric.addEventListener('change', (e)=> {
        //     if (e.target.value != 0) {
        //         for (const key in price) {
        //             if (key == e.target.value) {
        //                 let span = document.getElementsByClassName('mt-3')
        //                 console.log(document.getElementsByTagName('span')[0].innerHTML = price[key])
        //             }
        //         }
        //     }
        //     else {
        //         document.getElementsByTagName('span')[0].innerHTML = 456
        //     }
        // })
        
        // let moreFabric = document.querySelector('.more-fabric')
        // moreFabric.addEventListener('click', () => {
        //     let num = document.getElementById('fabNumber').value
        //     for (let i = 0; i < num; i++) {
        //         let parentDiv = document.getElementById('parentFab') 
        //         let childDiv = document.getElementById('childFab')
        //         let cln = childDiv.cloneNode(true)
        //         parentDiv.appendChild(cln)
        //     }
        // })

        let moreFabric = document.querySelector('.more-fabric')
        moreFabric.addEventListener('click', ()=> {
            let parentDiv = document.getElementById('parentFab')
            let childDiv = document.getElementById('childFab')
            let clone = childDiv.cloneNode(true)
            parentDiv.appendChild(clone)
        })
        // Array.from(moreFabric).forEach(element => {
        //     // console.log(element)
        //     element.addEventListener('click', (e)=> {
        //         let parentDiv = document.getElementById('parentFab') 
        //         let childDiv = document.getElementById('childFab')
        //         let cln = childDiv.cloneNode(true)
        //         parentDiv.appendChild(cln)
        //         console.log(cln)
        //     })
        // })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>