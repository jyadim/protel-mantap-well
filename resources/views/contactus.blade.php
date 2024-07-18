<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        #map iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
    </style>
    <title>pme-bandung</title>
</head>

<body>
    <div class="min-h-full">
        <nav class="relative px-4 py-4 flex justify-between items-center bg-white">
            <a class="text-3xl font-bold leading-none" href="/">
                <img class="h-10 w-30" src="data:image/png;base64,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"
                    alt="" srcset="">
            </a>
            <div class="lg:hidden">
                <button class="navbar-burger flex items-center text-blue-600 p-3">
                    <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Mobile menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                    </svg>
                </button>
            </div>
            <ul
                class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
                <li><a class="text-sm text-gray-400 hover:text-gray-500" href="/">Home</a></li>
                <li class="text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                        class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </li>
                <li><a class="text-sm text-gray-400 hover:text-gray-500" href="/serv">Services</a></li>
                <li class="text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                        class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </li>
                <li><a class="text-sm text-gray-400 hover:text-gray-500" href="/">Products</a></li>
                <li class="text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                        class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </li>
                <li><a class="text-sm text-gray-400 hover:text-gray-500" href="/">Gallery</a></li>
                <li class="text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                        class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </li>
                <li><a class="text-sm text-gray-400 hover:text-gray-500" href="/">About Us</a></li>
                <li class="text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                        class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </li>
                <li><a class="text-sm text-lime-600 font-bold" href="/p">Contact Us</a></li>
            </ul>
        </nav>
        <div class="navbar-menu relative z-50 hidden">
            <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
            <nav
                class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
                <div class="flex items-center mb-8">
                    <a class="mr-auto text-3xl font-bold leading-none" href="#">
                      <img class="w-8 h-8"
                      src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw8QERUQDw8QEBUPFREQERIVDRUPEQ8VGBcXGRcVGhsYKCggG
                      B0mGxUWITMhJSkuLi4vFys/RD8uQyg5OjcBCgoKDg0OGxAQGy0iICUtKy0tLS0rLSsvLS0tKy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0vLS0tLS
                      0tKy0tLf/AABEIAIAAgAMBEQACEQEDEQH/xAAcAAABBQEBAQAAAAAAAAAAAAAAAQQFBgcDCAL/xABIEAABAwIBBAoOCQMFAQAAAAABAAIDBBEFEiE
                      xQQYHFjRRcnSSsrMTIjI1UlNhZHGBsdHS4RQXM0JVc4ORkyOhwhUkRYSiRP/EABsBAAIDAQEBAAAAAAAAAAAAAAAFAQMGBAIH/8QANREAAQMDAAcF
                      BwMFAAAAAAAAAAECAwQFERITFSExQVEyMzRigSJCU2GRoeEUFnEGJTVEsf/aAAwDAQACEQMRAD8A3FAAgDzltvXq8bfAJXBsEUTDYkhpycs2Gruwv
                      LnYOepn1LNIrO5Tzl/M+ar1osW78tENynnD+b80a4Nr+UNynnD+b81GuDa/lDcp5w/m/NGuI2v5Q3KecP5vzRridr+UNynnD+b80a4Nr+UNynnD+b
                      80a4Nr+UNynnD+b80a4ja/lDcp5w/m/NGuJ2v5Q3Kecv5nzU60Eu/LRLLtR3o8bjgMri2eKVmc2DjkF4BGvOxWNdpDOmn1zNI9HL0dAIAEAROyfHo
                      MPppKqodZsYNhftpHfdY3ykoA84YNJLUyzV8/d1T3P8gBJJA8mgepUSuEd0qMqjEJdUqJREACAyCABAZBAAgMggAQGRUBzIjGXy08sNdB3dK9r/SA
                      QRfyavWrYXDq11CIqsU9HbF8fgxCmjqqd12yDtm37aN/3mO8oK6B4S6AMf2QbdohmmpqagdK6GR8OW6azS5ri2+S0EkXGi6hVweXOa3epn2LVeI4t
                      KJsRkyWMzxwNGQxnkDdXpOdVukF1VcGMTDOJIsYGgACwFgANQVG9eJnnPVy5UbYhJKOxshyTJPLHCzK0XcbD+9lGURuk7kdtBTpM/Dic3BY74dBz5
                      PhSpb/AEKLjK/T8jvY8fQNwWO+HQc+T4VG36Hqv0/IbHj6BuCx3w6DnyfCjb9D1X6fkNjx9A3BY74dBz5PhRt+h6r9PyGx4+gbgsd8Og/kk+FG36H
                      qv0/IbHj6BuCx3w6DnyfCjb9D1X6fkNjx9A3BY74dBz5PhRt+h6r9PyGx4+gbgsd8Og58nwqUv9Cu7K/T8hsePoQdBJL/AFI58kSQSyQvydF2mx9V
                      7ptlqtRycxJX0zYX4aOXsBBBFwcxB1hRnHA42uVq5QjsJq8QwmUzYbJdj88kDhlsf5C3X6RnXQ2Q0FLcWPTEnE0DANu0SzRU9Th7onTSMiL2TXaC5
                      waDkuAIGfhViLkZNc129DPqPf2Icpl6yRVSrgT3ZyojcfMlFRxEecgjepKIqqPdgeHGuxBswF4MPOWX/dkm+60cNtPq8oSq91baemVqL7TjT2qj0E
                      0nczZ188UeggAQAIAEEgggEACAMY2e4caHEHTkWgxAh4d92OYd008F9Pr8i+h2SrbPTIxV9pv/AAR3Wk000m8hldNTLuRUUFHA88CKrt+0HKYusjX
                      REuR7aFVUdn5C0e/sQ5TL1kiiULt7vqSMz7NJGoEj1KpOImiblyElsS2Bz4jBFU1VaWwzAu7DEzJeQCRYu0DRwFI7jfG0j1iY3KpzNdT2+JvtIhrG
                      E4XBSRNgp42xsZoaP7knWfKVjKqqkqXq+RcqM2oiJhB6uYkFCAClQBQmAEUgLdAAoAEAMsWwyCqidBURtkjfmLT7QdR8q6qaqkpno+NcKQ5MphTJ9
                      lmwKfDoJKmlrS6GEB3YZYw57QSBYO16eALZ26+tqpEic3CrzFlRb4nb1QjYH5TWk6wCU7UyMrcOVCNrt+0HKYusjV8Q5tPvegtHv7EOUy9ZIolC7+
                      76j+q7h3Fd7CquYnh7aGn7V/eql4jusevn198a83sXYQs00rWAue4NAzlxNgP3SyON0i6LUPT3oxuVUhzssoMrJ+kDgvkPyf3tZMEs9UqaWicO06b
                      ONImIZmvaHMcHNdnDgbgpfJE+NcOQ7Y3temUU+KqpjiaXyPDGjSXGwUwwvldhqZCSVrEy5cEdS7JqKV+QydtzmF2uYHeguFiuyS1VMbdJzTljuMD1
                      0WuHmIYlBTtyppGsB0X0n0AZyueCjlmXDELpamOJMvUb4fsgpJ3ZEUzS7wSCwn0ZWlXT22ogTLmlUNfBMuGqSi4P5OwaVmIQw/ayxx30ZTwCf3XTD
                      STSdlpRJUxR9pRvHj1G4hraiIlxAADxnJVrrdO1Mq08JXQquEUids/vVVcRvTYumxpiuYWzdnJl1J3DOK32BfQFMHP21GFdv2g5TF1kaviHFo970F
                      o9/YhyqXrJFExF34N9R/Vdw7iu9hVQoh7xDT9q/vTS8R3WPXz+++Neb2Hslb2dYu+Wd0INo4Ta3hP1k8Om3qWhstCjIUkXiplrtVq+TQTghWsk6bZ
                      tF7Zk7V8eccxTou0dLBZtgmLOinEBN2TZreC/URwaLJHfKJr4tNE3oN7TVObJoLwU+tsGvc+o7DftYQ3NqLnC9/2IUWKla2DTVN6k3ioV0mh0Kqny
                      6KphROmU3jmtrZZiDK8vLWhgvnsAqo4IoW7iySZ8uMnGN5aQ5pILTdpGkEL3JGj2YU8Mc5jkVDW/9VtRfSiM/YRJbVlW0fuvn60mazVfM2iVOKbWG
                      TVNQ+RxfI4uc43JOv3ehb2GFsbUaY2WV0jsnbCft4vzI+kFVWOjSF2CymR2sTJoG2f3qquI3psWMsvj2/ypt5OwZfSdwzit9i+gGDm7xRhXb9oOUx
                      dZGrYRxaODvQWj39iHKpeskRMRd+DfUf1XcO4rvYqhRF3iGn7WHeql4jum9fP71493obyPuyhY4f8Acz/my9IrZUHcNMRVrmZxLYjihZQw0ojbaRn
                      ZS++cf1H6vS3T5VxwUyurHS54cjsmmxTtYiDHYtCX1kIbqeHn0Nzn2LoukiNp3ZKLcxXToiHfZuP99N+n1bFVZ8rStU93TCVCnQNH+lXt/wDT/gvO
                      mv63GT3oJ+jycdhjQa2G4vnef/D1ddXaNOqp8im2ojp0RSOxIf1pPzJOkV00+VhRSio71UL3N3m/Sb0gso3/AChonf48zyN1iDYGxBsdBWxciuTBm
                      EXRfku+FbK45Zo4voUTMt7W5QcDk59PcrM1lrfGxZFeP6a4te9GIwk9s/vVVcRvTYlFk8cw0EvYMupPs28VvsC+gmCm7xRhXb9oOUx9ZGrYRxaODv
                      QWj39iHKpeskRMRd+DfUf1XcO4rvYqhRF20NP2r+9VLxHdN6+f3vx7v5Q3kXdlBxvfM35s3TctnRdw0xFV3ylkp9jElZBTyNkYwNiLDcEm/ZHm+b0
                      pPNdWUk724yo1Zbn1ETFRcIWfY5sbio7kEyPcLF5FrDgA1fJIq+6Pq9y7kG9Hb2U+/mUTZvv6b9Pq2rV2XwrTN3XxDjsO9X/Z/wAFX/vFn+kcNhW/
                      of1Orerrv4ZfQptnfp6kbin20v5knSK66XuEOeo71S+S95v0m9ILKNX+57zROT+3bjP6VjXPa17shrnNDnWvkgnOVr5XOYzLUM1GiOciOLnhmD4dH
                      NG9lcHua5pa3Kb2xvmGZZqqrKqRitVm4fU9PTMejmu3kntn96qriN6bEqsnj2D6XsbjLqTuGcVvsC+gGDm7xRhX79oOUxdZGrYRvaODvQWj39iHKp
                      eskRMF34N9R9Vdw7iu9hVQoi7aGobV/eql4jusevn978e7+UN5H3ZQsb3zN+bL0ytlROTUN3mJqmrrV3GmbDt5Q+h3SKxF38U41lsTFM1FJtLDvMn
                      2b7+m/T6ti+gWZyJStypjbo1f1Djr/wAV/wBn/BV6Sfrs5PeF/RHHYVv6L9Tq3q67ORaZcL0Kba1dehG4n9tL+ZJ0iuqmc3UJvKKhq61dxpmC0omw
                      5kRzCSItvwXvnWLq59VXK9ORqaaHWUiMXmZpiWHS07zHKwtI0G3auHCDrW0pqyOZiORTLT0z4n6KoGE/bxfmx9IKKxW6l2ME0ulrEU0DbP701XEb0
                      2LGWXx7f5U20nY3GX0n2bOK32BfQDBzd4owrt+0HKY+sjVsI3tHB3oLR7+xDlMvWSImJu3u+o/qu4dxXexVCeHtoaftX96qXiO6x6+fX3xrzewp7C
                      FidRQk3MUZJzkmMZ0vSplRMIpCwRquVQ6sYGizQABoAFgFS56uXeWNbg+15PRwfSRON3RscTpJYCf7q9lRI1MIpS6FirlUD6JHbJ7GzJvfJyBa/DZ
                      Rr5M5yTqmYxgGUkTTdsbGkaCGAEKXVMi8VBIWJwQQ0UJzmKPPp/ptQlTInMhYI15HZjABZoAA0ACwCqc5XLlSxGonASSNrhZzQ7yEXXpsrm8FIdG1
                      3FDk2ihGcRRgjOD2MZlatVKqdo8JBGnBCvbZ/eqq4jemxd9j8awmbsGX0ncN4rfYvoJgp+2pH12/aDlMXWRq2EcWj3vQWj39iHKZeskRMF2931H9Q
                      CWOA1tcB+yqQTw9tCybX+z+ipqWCiquzU74gWF74rRElziO2GcadYWYu9lmmlWaPfnkbWGoZo4RTUYpGuaHNcHNcAWuBu1w1EEaVkZI3MdouTCnZn
                      J0VZIIARAAgAQQCAFQAIJOckjWguc4Na0EucTYNA1knQrI41e7RamVIzhN5l+2Bs+oailnoqXs1Q+UBgfHFeIEOB7o5zo1ArXWmyTQzJPJuxyOSao
                      ZjGStUwsxoOprQf2WnMTN21I+u37Qcpi6yNWwji0e96C0e/sQ5TL1kimVAuyLhvqSio4CPgc5oWvGS9ocDqIupTjuLI5XMXSRSc2s8ZfSVIw6RxdB
                      UBzqUk37FIM7o8+oi/r9JSC/UDZYte1PaTj8zV22sSZuFNcWFG4KABSAIAEACgAQAKQMk2zcafVVJw6NxbDAGvqiDbsrznbHm1AWPp9C3VhoGxRJO
                      7tLw+QouVYkLcIQUMLWANY0NA1AWWgVevAykkrnrpKp0XniVkVXb9oOUx9ZGr4kwPbQi4d6Gg7INpMyzTVNLiDonTSSShj4e1aXOLiMtpva54FaqZ
                      GzmtduUoGK02IYTKIMSjux/wBnM3t2PHCHa/Qc6rdGLqq3Mdvj4kkxwIBBuDnBGsKjG8zz2q12FGldI+N8FREwvdTTxzZI0kNNyPXay8ubrGLGvNF
                      QZW2dI3+0XH62ZPwmf+cfCsyv9MIq959jRbRi6h9bMn4TP/OPhUftdPifYnaMXUPrZk/CZ/5x8KP2unxPsG0YuofWzJ+Ez/zj4UftdPifYNoxdQ+t
                      mT8Jn/nHwo/a6fE+wbRi6h9bMn4TP/OPhR+10+J9g2jF1D62ZPwmf+cfCj9rp8T7BtGLqH1syfhM/wDOPhUp/TCIvefYjaMXUp1FI+V89RIwsdUzS
                      TZJ0tBNwPLa9vUtMxmrYkackM7c50kf7I7e4AXJsBnJOoKcbxc1qudhCNwumxDFpTBhsfas+0md2jGDhLtWjQM66Gxj+ltzG75OJfsA2kjFNDUVWI
                      OkdDJHKWMhs1xa4Oycpxva402ViJgZNY1vA2JSeiJ2UYBBiFM+lqGgtkHaut20T/uvbwEFAHnHBmS08s1DP3dI9zPSAbG3k1j0qiVuBHdIERUehLq
                      nIm5ggMqCAyoIDKggMqCAyoIDKggMqCAyoIRQ5kRjLJaiSGhgzyVb2s4MxNhfya/Urom5HFrgRVV6no3Ytsfgw6mjpadtmxgZTrdtK89093CSfdqV
                      49JhACIAVAHnDbef9DxuSbIOTPFE/wAEOOSGGx9LF5c3SOeqp9czRKzuvb4k88e5VJELFtOfeDdg3xJ549yNURsjzBuwb4k88e5GqDZHmDdg3xJ54
                      9yNUGyPMG7BviTzx7kaoNkeYN2DfEnnj3I1QbI8wbsG+JPPHuRqg2R5g3YN8SeePcjVBsjzBuwb4k88e5GqDZHmDde3xJ549yFiJS0494su1E/6bj
                      cc3YzkwRSv8IN7QsBPBnerWt0RnTU+pZonpBejoC6AP//Z">
                    </a>
                    <button class="navbar-close">
                        <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div>
                    <ul>
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-lime-600 rounded"
                                href="/">Home</a>
                        </li>
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-lime-600 rounded"
                                href="/serv">Services</a>
                        </li>
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-lime-600 rounded"
                                href="/">Products</a>
                        </li>
                        <li class="mb-1">
                          <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-lime-600 rounded"
                              href="/">Gallery</a>
                      </li>
                        <li class="mb-1">
                          <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-lime-600 rounded"
                              href="/">About Us</a>
                      </li>
                        <li class="mb-1">
                            <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-lime-600 rounded"
                                href="/p">Contact Us</a>
                        </li>
                    </ul>
                </div>
                    <p class="my-4 text-xs text-center text-gray-400">
                        <span>Copyright © SukaSusuSapi 2024</span>
                    </p>
                </div>
            </nav>
        </div>
        <main>
            <section class="mb-32">
                <div id="map" class="relative h-[300px] overflow-hidden bg-cover bg-[50%] bg-no-repeat">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1717072224415!2d107.5493138143469!3d-6.870018469126014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e434be67b353%3A0x65421b7cacf3aaad!2sProtel+Multi+Energy!5e0!3m2!1sid!2sid!4v1560907933897!5m2!1sid!2sid"
                        width="100%" height="480" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="container px-6 md:px-12">
                    <div
                        class="block rounded-lg bg-[hsla(0,0%,100%,0.8)] px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]  md:py-16 md:px-12 -mt-[100px] backdrop-blur-[30px] border border-gray-300">
                        <div class="flex flex-wrap">
                            <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:px-3 lg:mb-0 lg:w-5/12 lg:px-6">
                                <form>
                                    <div class="relative mb-6" data-te-input-wrapper-init>
                                        <input type="text"
                                            class="peer block min-h-[auto] w-full rounded border-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none "
                                            id="exampleInput90" />
                                        <label
                                            class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none "
                                            for="exampleInput90">Name
                                        </label>
                                    </div>
                                    <div class="relative mb-6" data-te-input-wrapper-init>
                                        <input type="email"
                                            class="peer block min-h-[auto] w-full rounded border-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none "
                                            id="exampleInput91" />
                                        <label
                                            class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none "
                                            for="exampleInput91">Email address
                                        </label>
                                    </div>
                                    <div class="relative mb-6" data-te-input-wrapper-init>
                                        <input type="number"
                                            class="peer block min-h-[auto] w-full rounded border-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none "
                                            id="exampleInput90" />
                                        <label
                                            class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none "
                                            for="exampleInput90">Phone Numbers
                                        </label>
                                    </div>
                                    <div class="relative mb-6" data-te-input-wrapper-init>
                                        <textarea
                                            class="peer block min-h-[auto] w-full rounded border-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none "
                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                        <label for="exampleFormControlTextarea1"
                                            class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none ">Address</label>
                                    </div>
                                    <div class="relative mb-6" data-te-input-wrapper-init>
                                        <textarea
                                            class="peer block min-h-[auto] w-full rounded border-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none "
                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                        <label for="exampleFormControlTextarea1"
                                            class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none ">Message</label>
                                    </div>
                                    <div class="relative mb-6 numberVerify" data-te-input-wrapper-init>
                                        <input type="text"
                                            class="peer block min-h-[auto] w-full rounded border-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none "
                                            id="exampleInput90" />
                                        <label
                                            class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none "
                                            for="exampleInput90">Input The Following Numbers : <span
                                                id="verifyNum"></span>
                                        </label>
                                    </div>
                                    <button type="button"
                                        class="mb-6 w-full rounded bg-sky-500 text-white px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal   lg:mb-0">
                                        Contact Us
                                    </button>
                                </form>
                            </div>
                            <div class="w-full shrink-0 grow-0 basis-auto lg:w-7/12">
                                <div class="flex flex-wrap">
                                    <div
                                        class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:w-full lg:px-6 xl:w-6/12">
                                        <div class="flex items-start">
                                            <div class="shrink-0">
                                                <div class="inline-block rounded-md bg-sky-200 p-4 text-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="h-6 w-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.25 9.75v-4.5m0 4.5h4.5m-4.5 0l6-6m-3 18c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="ml-6 grow">
                                                <p class="mb-2 font-bold ">
                                                    Technical support
                                                </p>
                                                <p class="text-sm text-neutral-500">
                                                    admin@pme-bandung.com
                                                </p>
                                                <p class="text-sm text-neutral-500">
                                                    0813-9555-6300
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:w-full lg:px-6 xl:w-6/12">
                                        <div class="flex items-start">
                                            <div class="srink-0">
                                                <div class="inline-block rounded-md bg-sky-200 p-4 text-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="w-7 h-7">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="ml-6 grow">
                                                <p class="mb-2 font-bold ">
                                                    Address
                                                </p>
                                                <p class="text-sm text-neutral-500">
                                                    Gg.Awibitung No. 40 Ciawitali Selatan
                                                    Cimahi 40152 Jawa Barat, Indonesia <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="mb-12 w-full shrink-0 grow-0 basis-auto md:mb-0 md:w-6/12 md:px-3 lg:mb-12 lg:w-full lg:px-6 xl:w-6/12">
                                        <div class="align-start flex">
                                            <div class="shrink-0">
                                                <div class="inline-block rounded-md bg-sky-200 p-4 text-primary">
                                                    <svg version="1.1" id="Layer_1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        class="w-7 h-7" viewBox="0 0 111.756 122.879"
                                                        enable-background="new 0 0 111.756 122.879"
                                                        xml:space="preserve">
                                                        <g>
                                                            <path
                                                                d="M27.953,5.569v96.769h19.792V5.569H37.456H27.953L27.953,5.569z M21.898,105.123V2.785C21.898,1.247,23.254,0,24.926,0 h12.53h13.316C52.443,0,53.8,1.247,53.8,2.785v102.338c0,1.537-1.356,2.783-3.028,2.783H24.926 C23.254,107.906,21.898,106.66,21.898,105.123L21.898,105.123z M13.32,17.704c1.671,0,3.027,1.247,3.027,2.785 s-1.355,2.784-3.027,2.784H7.352c-0.161,0-0.292,0.022-0.39,0.064c-0.129,0.056-0.276,0.166-0.429,0.325 c-0.161,0.167-0.281,0.346-0.353,0.528c-0.083,0.208-0.125,0.465-0.125,0.759v90.803c0,0.287,0.043,0.537,0.125,0.74l0.034,0.092 c0.068,0.135,0.165,0.264,0.284,0.383c0.126,0.125,0.258,0.217,0.39,0.27c0.123,0.051,0.279,0.074,0.466,0.074h97.052 c0.188,0,0.346-0.025,0.467-0.074c0.133-0.053,0.264-0.145,0.389-0.27c3.035-3.035,0.441,1.799,0.441-1.215V24.949 c0-3.667,3.039,2.357-0.477-1.288c-0.143-0.146-0.287-0.254-0.43-0.314c-0.113-0.048-0.246-0.075-0.391-0.075H62.563 c-1.672,0-3.027-1.247-3.027-2.784s1.355-2.785,3.027-2.785h41.842c1.041,0,2.029,0.204,2.943,0.597 c0.895,0.385,1.699,0.945,2.393,1.663c0.664,0.686,1.17,1.468,1.514,2.334c0.332,0.839,0.502,1.726,0.502,2.652v90.803 c0,0.938-0.168,1.826-0.502,2.654c-0.344,0.859-0.865,1.639-1.549,2.324c-0.701,0.703-1.506,1.234-2.398,1.598 c-0.906,0.367-1.879,0.551-2.902,0.551H7.352c-1.022,0-1.995-0.184-2.901-0.551c-0.894-0.363-1.698-0.896-2.399-1.598 c-0.621-0.623-1.107-1.33-1.45-2.107c-0.036-0.07-0.069-0.143-0.099-0.217C0.168,117.574,0,116.684,0,115.752V24.949 c0-0.921,0.17-1.811,0.504-2.652c0.342-0.863,0.849-1.648,1.512-2.334c0.683-0.707,1.488-1.263,2.393-1.652 c0.929-0.401,1.917-0.607,2.943-0.607H13.32L13.32,17.704z M65.902,29.03h27.049c0.803,0,1.566,0.145,2.291,0.431 c0.076,0.03,0.15,0.063,0.223,0.099c0.607,0.269,1.166,0.635,1.666,1.096c0.584,0.533,1.027,1.128,1.326,1.782 c0.047,0.104,0.088,0.21,0.119,0.317c0.225,0.584,0.34,1.189,0.34,1.812v12.611c0,0.744-0.156,1.45-0.459,2.118l-0.004,0.009 l0.004,0.002c-0.291,0.64-0.725,1.224-1.291,1.75c-0.58,0.546-1.227,0.956-1.932,1.231c-0.736,0.287-1.5,0.426-2.283,0.426H65.902 c-0.777,0-1.535-0.14-2.27-0.426c-0.693-0.269-1.33-0.668-1.912-1.198c-0.588-0.539-1.031-1.144-1.326-1.81 c-0.033-0.078-0.063-0.157-0.09-0.235c-0.234-0.605-0.35-1.228-0.35-1.867V34.567c0-0.723,0.146-1.424,0.445-2.099l-0.006-0.002 c0.295-0.666,0.738-1.271,1.326-1.81l0.037-0.032l-0.002-0.001c0.877-0.78,2.039-1.219,2.119-1.244 C64.537,29.147,65.215,29.03,65.902,29.03L65.902,29.03z M93.475,34.599h-28.08v12.547h28.08V34.599L93.475,34.599z M78.877,63.42 c1.072,0,2.01,0.41,2.807,1.207s1.188,1.734,1.188,2.785c0,1.148-0.389,2.104-1.188,2.865c-0.799,0.758-1.734,1.129-2.807,1.129 c-1.129,0-2.084-0.371-2.844-1.129c-0.76-0.762-1.148-1.717-1.148-2.865c0-1.051,0.391-1.988,1.148-2.785 S77.748,63.42,78.877,63.42L78.877,63.42z M90.977,63.42c1.072,0,2.008,0.41,2.805,1.207s1.189,1.734,1.189,2.785 c0,1.148-0.391,2.104-1.189,2.865c-0.799,0.758-1.732,1.129-2.805,1.129c-1.131,0-2.086-0.371-2.846-1.129 c-0.76-0.762-1.148-1.717-1.148-2.865c0-1.051,0.391-1.988,1.148-2.785S89.846,63.42,90.977,63.42L90.977,63.42z M66.662,75.518 c1.15,0,2.105,0.389,2.865,1.148s1.129,1.715,1.129,2.865c0,1.051-0.371,1.988-1.129,2.785s-1.715,1.209-2.865,1.209 c-1.053,0-1.988-0.412-2.785-1.209s-1.209-1.734-1.209-2.785c0-1.15,0.41-2.105,1.209-2.865S65.609,75.518,66.662,75.518 L66.662,75.518z M78.877,75.518c1.072,0,2.008,0.389,2.807,1.148s1.188,1.715,1.188,2.865c0,1.051-0.391,1.988-1.188,2.785 s-1.734,1.209-2.807,1.209c-1.129,0-2.086-0.412-2.844-1.209s-1.148-1.734-1.148-2.785c0-1.15,0.389-2.105,1.148-2.865 S77.748,75.518,78.877,75.518L78.877,75.518z M90.977,75.518c1.072,0,2.006,0.389,2.805,1.148s1.189,1.715,1.189,2.865 c0,1.051-0.393,1.988-1.189,2.785s-1.732,1.209-2.805,1.209c-1.131,0-2.088-0.412-2.846-1.209s-1.148-1.734-1.148-2.785 c0-1.15,0.389-2.105,1.148-2.865S89.846,75.518,90.977,75.518L90.977,75.518z M66.662,87.518c1.15,0,2.107,0.393,2.865,1.189 s1.129,1.773,1.129,2.922c0,1.053-0.369,1.988-1.129,2.787s-1.715,1.207-2.865,1.207c-1.053,0-1.986-0.408-2.785-1.207 s-1.209-1.734-1.209-2.787c0-1.148,0.412-2.125,1.209-2.922S65.609,87.518,66.662,87.518L66.662,87.518z M78.877,87.518 c1.072,0,2.01,0.393,2.807,1.189s1.188,1.773,1.188,2.922c0,1.053-0.389,1.988-1.188,2.787s-1.734,1.207-2.807,1.207 c-1.129,0-2.084-0.408-2.844-1.207s-1.148-1.734-1.148-2.787c0-1.148,0.391-2.125,1.148-2.922S77.748,87.518,78.877,87.518 L78.877,87.518z M90.977,87.518c1.072,0,2.008,0.393,2.805,1.189s1.189,1.773,1.189,2.922c0,1.053-0.391,1.988-1.189,2.787 s-1.732,1.207-2.805,1.207c-1.131,0-2.086-0.408-2.846-1.207s-1.148-1.734-1.148-2.787c0-1.148,0.391-2.125,1.148-2.922 S89.846,87.518,90.977,87.518L90.977,87.518z M78.877,99.617c1.072,0,2.008,0.389,2.807,1.188s1.188,1.734,1.188,2.807 c0,1.129-0.389,2.084-1.188,2.844s-1.734,1.148-2.807,1.148c-1.129,0-2.084-0.389-2.844-1.148s-1.148-1.715-1.148-2.844 c0-1.072,0.389-2.008,1.148-2.807S77.748,99.617,78.877,99.617L78.877,99.617z M66.662,63.42c1.15,0,2.107,0.41,2.865,1.207 s1.129,1.734,1.129,2.785c0,1.148-0.369,2.104-1.129,2.865c-0.76,0.758-1.715,1.129-2.865,1.129c-1.053,0-1.986-0.371-2.785-1.129 c-0.799-0.762-1.209-1.717-1.209-2.865c0-1.051,0.412-1.988,1.209-2.785S65.609,63.42,66.662,63.42L66.662,63.42z" />
                                                        </g>
                                                    </svg>

                                                </div>
                                            </div>
                                            <div class="ml-6 grow">
                                                <p class="mb-2 font-bold ">Land Line</p>
                                                <p class="text-neutral-500"> (022) 6631608
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:w-full lg:px-6 xl:mb-12 xl:w-6/12">
                                        <div class="align-start flex">
                                            <div class="shrink-0">
                                                <div class="inline-block rounded-md bg-sky-200 p-4 text-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="ml-6 grow">
                                                <p class="mb-2 font-bold ">Mobile</p>
                                                <p class="text-neutral-500"> 0813-9555-6300
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <div class="px-4 pt-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
            <div class="grid gap-10 row-gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
                <div class="sm:col-span-2">
                    <a href="/" aria-label="Go home" title="Company" class="inline-flex items-center">
                        <img class="w-8 h-8"
                            src="data:image/jpeg;base64,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"
                            alt="" srcset="">
                        <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase">PME Bandung</span>
                    </a>
                    <div class="mt-6 lg:max-w-sm">
                        <p class="text-base font-bold tracking-wide text-gray-900">Contacts</p>
                        <div class="flex">
                            <p class="mr-1 text-gray-800">Phone:</p>
                            <a href="tel:850-123-5021" aria-label="Our phone" title="Our phone"
                                class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">0813-9555-6300</a>
                        </div>
                        <div class="flex">
                            <p class="mr-1 text-gray-800">Email:</p>
                            <a href="mailto:info@lorem.mail" aria-label="Our email" title="Our email"
                                class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">admin@pme-bandung.com</a>
                        </div>
                        <div class="flex">
                            <p class="mr-1 text-gray-800">Address:
                            </p>
                            <a href="https://maps.app.goo.gl/U58e685HfQDoHEpr5" target="_blank"
                                rel="noopener noreferrer" aria-label="Our address" title="Our address"
                                class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">
                                Gg.Awibitung No. 40 Ciawitali Selatan
                                Cimahi 40152 Jawa Barat, Indonesia
                            </a>
                        </div>
                    </div>
                </div>
                <div class="space-y-2 text-sm">
                    <span class="text-base font-bold tracking-wide text-gray-900">Social</span>
                    <div class="flex items-center mt-1 space-x-3">
                        <a href="/"
                            class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                                <path
                                    d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z">
                                </path>
                            </svg>
                        </a>
                        <a href="/"
                            class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
                            <svg viewBox="0 0 30 30" fill="currentColor" class="h-6">
                                <circle cx="15" cy="15" r="4"></circle>
                                <path
                                    d="M19.999,3h-10C6.14,3,3,6.141,3,10.001v10C3,23.86,6.141,27,10.001,27h10C23.86,27,27,23.859,27,19.999v-10   C27,6.14,23.859,3,19.999,3z M15,21c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S18.309,21,15,21z M22,9c-0.552,0-1-0.448-1-1   c0-0.552,0.448-1,1-1s1,0.448,1,1C23,8.552,22.552,9,22,9z">
                                </path>
                            </svg>
                        </a>
                        <a href="/"
                            class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                                <path
                                    d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z">
                                </path>
                            </svg>
                        </a>
                    </div>

                </div>
            </div>
            <div>
            </div>
            <div class="flex flex-col-reverse justify-between pt-5 pb-10 border-t lg:flex-row">
                <p class="text-sm text-gray-600">
                    © Copyright 2024 SukaSusuSapi. All rights reserved.
                </p>

            </div>
        </div>
    </div>
</body>

</html>
<script>
    // Burger menus
    document.addEventListener('DOMContentLoaded', function() {
        // open
        const burger = document.querySelectorAll('.navbar-burger');
        const menu = document.querySelectorAll('.navbar-menu');

        if (burger.length && menu.length) {
            for (var i = 0; i < burger.length; i++) {
                burger[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        // close
        const close = document.querySelectorAll('.navbar-close');
        const backdrop = document.querySelectorAll('.navbar-backdrop');

        if (close.length) {
            for (var i = 0; i < close.length; i++) {
                close[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        if (backdrop.length) {
            for (var i = 0; i < backdrop.length; i++) {
                backdrop[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }
    });
</script>

<script>
    $(document).ready(function() {
        function randomgen() {
            var rannumber = '';
            for (ranNum = 1; ranNum <= 6; ranNum++) {
                rannumber += Math.floor(Math.random() * 10).toString();
            }
            $("#verifyNum").html(rannumber);
            $("#verifyNumHidden").val(rannumber);
        }
        randomgen();
        $("#formcontactus").submit(function() {
            if ($("#enterVerify").val() == $("#verifyNumHidden").val()) {
                $("form").attr('action', 'https://www.pme-bandung.com/submit/contactus');
                return true;
            } else {
                swal("CAPTCHA tidak sesuai", "Masukkan Angka Verifikasi sesuai yang tertera di form",
                    "error");
                randomgen();
                $("#enterVerify").select();
                $("#enterVerify").focus();
                return false;
            }
        });
    });
</script>
