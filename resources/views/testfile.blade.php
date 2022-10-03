<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .bg-aqua {
            background-color: aqua;
        }
    </style>
</head>

<body>
    <input type="radio" id="radio_1" class="radio-class" name="radio" value="Red">
    <label for="radio_1" class="bg-aqua">RED</label>
    <input type="radio" id="radio_2" class="radio-class" name="radio" value="Blue">
    <label for="radio_2">BLUE</label>
    <input type="radio" id="radio_3" class="radio-class" name="radio" value="Green">
    <label for="radio_3">GREEN</label>
    <input type="radio" id="radio_4" class="radio-class" name="radio" value="Black">
    <label for="radio_4">BLACK</label>

    <button type="submit" onclick="addToCart()">ADD TO CART</button>

    <table border="2">
        <thead>
            <tr>
                <td>AAA</td>
                <td>BBB</td>
                <td>CCC</td>
                <td>DDD</td>
                <td>EEE</td>
                <td>FFF</td>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 5; $i++) 
            <tr>
                <td rowspan="3">aaa</td>
                <td rowspan="3">bbb</td>
                <td rowspan="3">ccc</td>
                @for ($i = 0; $i < 2; $i++)
                <tr>
                <td>ddd</td>
                <td>eee</td>
                
                @endfor
                <td rowspan="3">fff</td>
                </tr>
                @endfor
        </tbody>
    </table>

    <script>
        function addToCart() {
            console.log("CLICKED")
            let radio = document.querySelector('input[name="radio"]:checked')
            if (radio != null) {
                console.log(radio.value)
            } else {
                console.log("NOT SELECTED")
            }
        }
    
        // var click = document.querySelectorAll('.radio-class')
        // Array.from(click).forEach(element => {
        //     element.addEventListener('click', ()=> {
        //     console.log("GUGU")
        //     })
        // });
    </script>
</body>

</html>