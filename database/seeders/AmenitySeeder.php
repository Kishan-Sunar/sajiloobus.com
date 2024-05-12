<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Passenger;
use \App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('amenities')->insert([
            [
                'name' => 'AC',
                'svg_icon' => '
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-width="1.5">
                            <path
                            d="M2 7.571c0-2.414 0-3.62.655-4.441c.14-.176.299-.335.475-.475C3.95 2 5.157 2 7.57 2h8.858c2.414 0 3.62 0 4.442.655c.175.14.334.299.475.475C22 3.95 22 5.157 22 7.57c0 3.22 0 4.829-.873 5.923a3.948 3.948 0 0 1-.633.633C19.4 15 17.79 15 14.571 15H9.43c-3.22 0-4.829 0-5.923-.873a4 4 0 0 1-.633-.633C2 12.4 2 10.79 2 7.571Z" />
                        <path stroke-linecap="round"
                            d="m7 17.5l-.307.46A1.321 1.321 0 0 0 7 19.75c.56.42.695 1.206.306 1.79L7 22m5-4.5l-.307.46A1.321 1.321 0 0 0 12 19.75c.56.42.695 1.206.306 1.79L12 22m5-4.5l-.307.46A1.321 1.321 0 0 0 17 19.75c.56.42.695 1.206.306 1.79L17 22m1-7.5c0-.465 0-.697-.039-.89a2 2 0 0 0-1.571-1.572C16.197 12 15.964 12 15.5 12H9c-.932 0-1.398 0-1.766.152a2 2 0 0 0-1.082 1.083c-.122.295-.146.653-.151 1.265M6 8.5h12M6 6h12" />
                    </g>
                </svg>'
            ],
            [
                'name' => 'WIFI',
                'svg_icon' => '
                    <svg viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M29.1007 11.4656C29.1949 11.3741 29.2683 11.2631 29.3156 11.1405C29.3629 11.0179 29.383 10.8865 29.3746 10.7553C29.3663 10.6242 29.3296 10.4964 29.267 10.3808C29.2045 10.2651 29.1177 10.1645 29.0125 10.0856C25.0151 7.17928 20.198 5.61735 15.2557 5.625C10.1163 5.625 5.36129 7.27875 1.49879 10.0856C1.3935 10.1643 1.30652 10.2649 1.24384 10.3804C1.18116 10.496 1.14427 10.6237 1.13572 10.7549C1.12716 10.886 1.14715 11.0175 1.19429 11.1402C1.24143 11.2629 1.31461 11.3739 1.40879 11.4656C1.57266 11.627 1.78848 11.725 2.01785 11.7422C2.24721 11.7594 2.47522 11.6946 2.66129 11.5594C6.32718 8.91373 10.7348 7.49308 15.2557 7.5C19.9563 7.5 24.3063 9.00375 27.8482 11.5575C28.2325 11.835 28.7669 11.8013 29.1007 11.4656Z" fill="currentColor"/>
                    <path d="M25.06 15.5081C25.1567 15.4149 25.2313 15.3013 25.2785 15.1757C25.3257 15.05 25.3444 14.9154 25.3331 14.7816C25.3217 14.6478 25.2808 14.5183 25.2131 14.4023C25.1454 14.2863 25.0528 14.1869 24.9419 14.1113C22.0589 12.2385 18.6935 11.2444 15.2557 11.25C11.6838 11.25 8.35567 12.3 5.56942 14.1113C5.45795 14.1865 5.36476 14.2857 5.29669 14.4017C5.22862 14.5177 5.18741 14.6474 5.17608 14.7814C5.16475 14.9154 5.18359 15.0502 5.23121 15.176C5.27884 15.3018 5.35404 15.4153 5.45129 15.5081C5.61105 15.664 5.81906 15.761 6.04119 15.7832C6.26333 15.8053 6.4864 15.7513 6.67379 15.63C9.23509 13.9895 12.214 13.1199 15.2557 13.125C18.2967 13.1203 21.2749 13.9898 23.8357 15.63C24.2219 15.8775 24.7357 15.8325 25.06 15.5081ZM20.9669 19.6013C21.3907 19.1775 21.3138 18.4669 20.7794 18.195C19.0685 17.3243 17.1754 16.872 15.2557 16.875C13.2682 16.875 11.3894 17.3513 9.73192 18.195C9.19754 18.4669 9.12067 19.1775 9.54442 19.6013L9.57254 19.6294C9.87254 19.9294 10.3357 19.9856 10.7182 19.7981C12.1305 19.106 13.6829 18.7474 15.2557 18.75C16.8832 18.75 18.4244 19.1269 19.7932 19.8C20.1738 19.9875 20.6369 19.9313 20.9369 19.6294L20.9669 19.6013ZM17.2432 23.325C17.6107 22.9575 17.6144 22.35 17.1682 22.0875C16.5897 21.7432 15.9289 21.5618 15.2557 21.5625C14.5825 21.5618 13.9216 21.7432 13.3432 22.0875C12.8969 22.35 12.9007 22.9575 13.2682 23.325L14.5919 24.6488C14.7677 24.8245 15.0061 24.9232 15.2547 24.9232C15.5033 24.9232 15.7417 24.8245 15.9175 24.6488L17.2432 23.325Z" fill="currentColor"/>
                    </svg>'
            ],
            [
                'name' => 'Bottle',
                'svg_icon' => '
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g fill="none">
                        <path fill="currentColor"
                        d="m18.45 8.279l.748-.06l-.747.06m.015.187l.749-.047zM16.614 12.9l.495.563zm.137-.122l.505.554zm-6.68-3.82l.738.127l-.739-.127m.032-.185l.737.139l-.737-.14m2.884-3.786l.331.673l-.33-.673m-.162.081l.342.667l-.342-.667m-5.093 8.398l-.526-.535l.526.535m.66.402a.75.75 0 1 0-1.064-1.058l1.064 1.058m1.647-4.729l.737.135l-.737-.135m4.002 8.128l.732.165zm.041-.18l-.73-.174v.005l.73.17m2.397-4.068l.502.557zM7.65 20.413l.387-.643zM5.462 18.81l-.621.42zm1.486-4.573l.525.535l-.525-.535m-1.77 2.08l-.7-.268l.7.267m3.138 4.496l-.387.642l.387-.642m2.424 1.176l-.07.747l.07-.747m3.053-3.628l-.731-.166l.731.166m-.84 2.638l.597.453l-.598-.453M18.34 2.9l.387-.643l-.387.643m.41.308l.633-.404l-.632.404m-.123.764l.656.363l-.656-.363m.202-.472l-.75-.034l.75.034m-2.383-.773l-.656-.363l.656.363m.313-.447l.413.626l-.413-.626m.8.15l-.387.642l.387-.643m-.495-.232l.045-.749l-.045.749M9.138 9.7a.75.75 0 1 0 1.443.41zm5.76 5.3l.653.367l-.654-.368m.735-10.861l2.152 1.296l.774-1.285l-2.152-1.296l-.774 1.285m-6.93 16.03l-.665-.4l-.774 1.285l.665.4l.774-1.285m4.607-3.07l-.248 1.095l1.463.332l.248-1.095l-1.463-.331m-5.837-2.328L8.257 14l-1.052-1.07l-.784.772l1.051 1.07m5.845-9.112l3.032-1.49l-.661-1.346l-3.032 1.49zm4.106-.807l.28 3.485l1.494-.12l-.279-3.484l-1.495.12m-.748-.993l.426-.77l-1.312-.727l-.427.771zm.496-.79l.78.471l.774-1.285l-.78-.47l-.774 1.285m.798.538l-.455.822l1.313.727l.455-.823l-1.313-.726m-.267 4.73l.014.176l1.497-.095l-.016-.2l-1.495.12m-.594 5.125c.068-.06.109-.095.147-.13l-1.01-1.11l-.128.114l.991 1.126m.608-4.95c.09 1.419-.46 2.789-1.471 3.71l1.01 1.11c1.358-1.238 2.076-3.055 1.958-4.914l-1.497.095m-6.908.572l.03-.173l-1.473-.278c-.01.052-.02.106-.035.197l1.478.254m1.848-4.77c-.08.039-.129.062-.175.086l.685 1.334l.151-.075l-.661-1.346M10.84 8.911c.262-1.391 1.128-2.561 2.327-3.177L12.482 4.4c-1.626.835-2.772 2.404-3.116 4.233zM8.258 14l.134-.133l-1.064-1.058l-.122.121zM9.33 8.83a16.75 16.75 0 0 1-.03.174l1.475.27c.01-.05.018-.1.033-.19L9.331 8.83m5.442 8.601l.027-.12l.01-.04l.002-.011v-.004l-.73-.17l-.73-.17v.002l-.001.003a.734.734 0 0 1-.003.011l-.01.042l-.028.126l1.463.331m1.345-5.095l-.141.125l1.004 1.114l.128-.113l-.99-1.126m-8.08 7.433c-.631-.38-1.07-.645-1.395-.874c-.322-.226-.472-.377-.559-.506l-1.243.84c.236.35.558.625.939.893c.378.266.872.563 1.484.932zm-1.616-6.067c-.513.504-.927.91-1.234 1.258c-.31.35-.56.694-.71 1.088l1.401.534c.056-.148.17-.332.433-.629c.264-.3.633-.662 1.161-1.182l-1.051-1.07m-.338 4.688a1.986 1.986 0 0 1-.205-1.808l-1.402-.534a3.486 3.486 0 0 0 .364 3.18l1.243-.838m1.845 3.064c.612.37 1.105.667 1.516.876c.412.21.807.366 1.225.405l.14-1.493c-.14-.013-.335-.07-.685-.249c-.351-.179-.79-.443-1.422-.824l-.774 1.285m5.133-3.26c-.167.737-.285 1.253-.401 1.644c-.117.389-.213.585-.306.707l1.195.906c.254-.335.413-.731.548-1.184c.134-.45.264-1.025.427-1.741l-1.463-.332m-2.392 4.541a3.233 3.233 0 0 0 2.88-1.284l-1.196-.906a1.733 1.733 0 0 1-1.543.697l-.14 1.493m7.283-19.195l.143.087c.038.024.061.04.075.05c.029.02-.012-.003-.052-.067l1.264-.808a1.26 1.26 0 0 0-.337-.344c-.096-.07-.214-.14-.32-.203l-.773 1.285m1.33.793c.06-.108.126-.227.175-.335c.053-.116.111-.274.12-.466l-1.499-.068c.004-.076.027-.116.013-.084l-.041.08l-.08.147l1.312.726m-1.165-.723a.25.25 0 0 1-.039-.146l1.499.068a1.25 1.25 0 0 0-.195-.73l-1.264.808m-1.016-.522l.088-.156c.024-.043.04-.068.05-.084c.022-.033 0 .011-.068.056l-.826-1.252c-.17.112-.28.253-.354.364c-.069.103-.138.23-.202.346l1.312.726m.844-1.303c-.113-.068-.237-.144-.349-.199a1.26 1.26 0 0 0-.488-.139l-.09 1.498c-.08-.005-.122-.032-.087-.014c.017.008.043.022.085.047c.043.024.091.054.155.092l.774-1.285m-.774 1.119a.25.25 0 0 1-.153.04l.09-1.497a1.25 1.25 0 0 0-.763.205l.826 1.252m-6.59 7.207a9.02 9.02 0 0 0 .194-.838l-1.475-.27a7.429 7.429 0 0 1-.163.697l1.443.41m4.23 7.149c.16-.67.41-1.307.74-1.893l-1.309-.735a8.832 8.832 0 0 0-.89 2.28l1.459.348m.74-1.893a7.07 7.07 0 0 1 1.429-1.792l-1.004-1.114a8.57 8.57 0 0 0-1.734 2.17l1.308.736" />
                        <path stroke="currentColor" stroke-linecap="square" stroke-width="1.5"
                            d="m17.698 9.267l-.802.268c-.87.29-1.829.119-2.545-.454a2.704 2.704 0 0 0-2.899-.307l-.726.363" />
                    </g>
                </svg>'
            ],
            [
                'name' => 'Toilet',
                'svg_icon' => '
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                    <path fill="currentColor"
                        d="M21 1a2 2 0 0 0-2 2v9H3.5A2.5 2.5 0 0 0 1 14.5v2a1.5 1.5 0 0 0 1.414 1.498a11 11 0 0 0 3.396 5.327c.549.474 1.145.896 1.782 1.256L6.097 27.57c-.093.186-.227.453-.328.733c-.1.277-.21.678-.158 1.11c.06.5.332.959.832 1.25c.44.254.982.337 1.557.337h14c.825 0 1.567-.402 2.082-.918c.515-.515.918-1.257.918-2.082v-8c0-.268.155-.627.445-1.024A4 4 0 0 0 29 15V3a2 2 0 0 0-2-2zM9.416 25.403A10.99 10.99 0 0 0 13 26c4.22 0 8.114-2.081 10-5.582V28c0 .175-.098.433-.332.668c-.235.235-.493.332-.668.332H8c-.146 0-.261-.008-.349-.02c.058-.159.142-.33.243-.533zM20.5 17c.334.445.814.775 1.368.92C20.811 21.587 17.223 24 13 24c-2.29 0-4.38-.855-5.968-2.263A9.002 9.002 0 0 1 4.222 17zm-.45-1H3v-1.5a.5.5 0 0 1 .5-.5H20v1.5c0 .171.017.338.05.5M27 15a2 2 0 0 1-2 2h-2.5a1.5 1.5 0 0 1-1.5-1.5V3h6z" />
                </svg>'
            ],
            [
                'name' => 'TV',
                'svg_icon' => '
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g fill="none">
                            <path stroke="currentColor" stroke-width="1.5"
                            d="M22 16c0 2.828 0 4.243-.879 5.121C20.243 22 18.828 22 16 22H8c-2.828 0-4.243 0-5.121-.879C2 20.243 2 18.828 2 16v-4c0-2.828 0-4.243.879-5.121C3.757 6 5.172 6 8 6h8c2.828 0 4.243 0 5.121.879C22 7.757 22 9.172 22 12z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="m9 2l3 3.5L15 2m1 4v16" />
                        <path fill="currentColor" d="M20 16a1 1 0 1 0-2 0a1 1 0 0 0 2 0m0-4a1 1 0 1 0-2 0a1 1 0 0 0 2 0" />
                    </g>'
            ],
        ]);
    }
}