<template>
  <div class="wrapper">
    <h1>Garść informacji o projekcie</h1>
    <p></p>
    <p>
      System zbierania danych z kilkudziesięciu czujników. Zaczął powstawać w maju 2016 roku. Strona
      typu SPA powstaje od grudnia 2018 przy pomocy framework-a Vue. W maju 2021 rozpocząłem
      migrację z Vue2 do Vue3.
    </p>
    <p>
      Od jakiegoś czasu działał u mnie minikomputer Raspberry Pi z zainstalowanym Raspianem oraz
      systemem monitoringu temperatury (i nie tylko)
      <a href="https://techfreak.pl/nettemp/" target="_blank">Nettemp</a>
      autorstwa techfreak. Mierzy on temperatury w kotłowni i na zewnątrz budynku za pomocą
      czujników DS18B20 oraz DHT22 (bardzo słabe i zawodne).
    </p>
    <p>
      Po kilku miesiącach zacząłem myśleć nad własną stacją pogody która mogła by oprócz temperatur
      mierzyłć również inne parametry i co najważniejsze była mojego autorstwa. Dzięki pomocy ze
      strony forum
      <a href="https://forum.atnel.pl/portal.php" target="_blank">Atnel</a>
      oraz kanałowi YouTube
      <a href="https://www.youtube.com/channel/UC9helAwUtau_y4qyTcSR4Tg" target="_blank"
        >Atnel - mirekk36</a
      >
      zaprojektowałem a następnie polutowałem urządzenie i zaprogramowałem w języku C mikrokontroler
      Atmega 32A który jest `sercem` stacji meteo. Stacja zbiera informacje z czujników: temperatury
      (DS18B20, BMP180, SHT21), wilgotności (SHT21), ciśnienia (BMP180), wiatru, opadów oraz
      nasłonecznienia (BH1750). 9 lutego 2020 zamieniłem czujnki SHT21 i BMP 180 na jeden BME280
      który mierzy temperaturę, ciśnienie i wilgotność.
    </p>
    <p>
      Zachęcony udaną budową stacji złożyłem projekt firmy
      <a href="https://www.atnel.pl/" target="_blank">Atnel</a> opisany w żółtej książce Mirosława
      Kardasia czyli zegar w dwóch sztukach. Po modyfikacjach oprogramowania zegary znajdujące się w
      salonie oraz sypialni wysyłają dane do Raspberry Pi który zapisuje je w zewnętrznej bazie
      danych.
    </p>
    <p>
      Kolejną małą częścią projektu stało się urządzenie oparte o znany moduł wi-fi ESP8266 do
      którego podłączyłem czujnik temperatury DS18B20 w hermetcznej obudowie i umieściłem w
      akwarium. On również wysyła swoje dane do Nettemp-a.
    </p>
    <p>
      Ostatnim elementem `układanki` jest odpytywanie bazy danych
      <a href="https://airly.eu/pl/" target="_blank">Airly</a> o dane z czujników jakości powietrza
      znajdującego się w mojej miejscowości (od maja 2021 dostępne są dwa czujniki).
    </p>
    <p>
      Dane z wszystkich moich części systemu trafiają co minutę (dane jakości powietrza ze względu
      na ograniczenia AirlyAPI odczytywane są co kwadrans) do bazy danych MySQL umieszczonej na
      zewnętrznym serwerze. Odbywa się to za pośrednictwem napisanych przeze mnie skryptów PHP.
      Dopiero z tej bazy poprzez mój mini system Rest API czerpie informacje ta strona. Jeśli jest
      problem z danym czujnikiem i z jakiegoś powodu dane są starsze niż 5 minut (16 minut czujniki
      jakości powietrza) sygnalizowane to jest czerwoną obwódką wokół ikony czujnika. Po kliknięciu
      na czujnik pokazują się bardziej szczegółowe informacje. Natomist kliknięcie na tytuł
      kategorii powoduje jej ukrycie lub pokazanie.
    </p>
    <p>
      W zakładce `Odczyty archiwalne` można uzyskać podstawowe dane statystyczne (odczyt maksymalny,
      minimalny, średni i w niektórych wypadkach sumę) z czujników w danym przedziale czasowym: rok,
      miesiąc, dzień i godzina
    </p>
    <div class="sliderContainer">
      <div class="sliderWrapper">
        <Gallery />
      </div>
    </div>
  </div>
</template>

<script>
import Gallery from './Gallery.vue';

export default {
  components: {
    Gallery,
  },
  data: () => ({}),
  methods: {},
};
</script>

<style lang="scss" scoped>
.wrapper {
  p {
    margin: 1.5em 1.5em;
    text-align: justify;
  }
  p + p {
    text-indent: 2em;
  }
  a {
    // text-decoration: none;
    color: #c7eafd;
  }
}
.sliderContainer {
  display: flex;
  justify-content: center;
  width: 100%;
  left: 0;
}
.sliderWrapper {
  width: 85%;
}
</style>
