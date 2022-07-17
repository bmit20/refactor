<?php

namespace App\Libraries\Commands;

use App\Constants\MediaConstant;
use App\Constants\RegisterMessageConstant;
use App\Exceptions\DummyException;
use App\Libraries\Sentry;
use App\Models\RabbitMQ\AdFactory\AdFactoryUserPagesRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersAfrangdigitalRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersAghayesangiRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersAsroonRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersAtrumeRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersBanimodeRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersBarjilRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersBasalamRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersBatteriesRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersBehinminerRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersBidopinRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersBishtarazyekRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersBodySpinnerRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersBonakchiRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersBornosmodeRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersCartonsabzRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersDaneshlandRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersDanielleeiranRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersDekomajRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersDeydigitalRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersDigiberoozRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersEsamRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersFafaitRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersGanjipakhshRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersHomsaRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersIranmrcarpetRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersEseminarRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersIransporterRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersJavanbakhtgoldRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersJimboshopRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersKalatikRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersKetablandRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersKhaneyenoRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersKharidkala24RabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersLipakRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersLohegostareshRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersLoziRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersManilooRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersMashinnoRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersMelliShoesRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersNamayandeyabRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersNiluxRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersNoornegarRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersPasariaRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersPelazioRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersRoshapharmacyRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersRtlthemeRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersSabzimanRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersSana3dRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersSchemaRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersShabjomeRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersShahrsaatRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersShopsabzRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersSnappmarketRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersTexnoliRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersVenkaRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersVistorRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersVitrinezibaRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersVitrinnetRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersWatchonlineRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersWinmarketRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersYaarmedRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersZhaketRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersZhiyarRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersMartoRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersJeaniranshopRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersMajeurshawlRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersTarisgoldRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersTirdadhomeRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersKalavarzeshRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersParstinaRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersKhanoumiRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersChapaghaRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersSetmenRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersDobisellRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersIdebookRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersBornaShoRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersZoobitechRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersMahfamshopRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersShahreketabonlineRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersRubikRabbitModel;
use App\Models\RabbitMQ\AdFactory\Crawlers\AdFactoryCrawlersMoeinsoftRabbitModel;
//last_use
//ATTENTION : please do not remove above comment this is a flag for crawler generator
use Exception;
use PhpAmqpLib\Channel\AMQPChannel;
use Psr\Log\LogLevel;
use company\PHPShared\Time;
use company\PHPShared\Log\companyLogger;

class UserPagesLibrary extends CommonLibrary
{
    //crawlers
    private AdFactoryCrawlersDobisellRabbitModel $adFactoryCrawlersDobisellRabbitModel;
    private AMQPChannel $adFactoryCrawlersDobisellRabbitChannel;

    private AdFactoryCrawlersSchemaRabbitModel $adFactoryCrawlersSchemaRabbitModel;
    private AMQPChannel $adFactoryCrawlersSchemaRabbitChannel;

    private AdFactoryCrawlersBanimodeRabbitModel $adFactoryCrawlersBanimodeRabbitModel;
    private AMQPChannel $adFactoryCrawlersBanimodeRabbitChannel;

    private AdFactoryCrawlersBonakchiRabbitModel $adFactoryCrawlersBonakchiRabbitModel;
    private AMQPChannel $adFactoryCrawlersBonakchiRabbitChannel;

    private AdFactoryCrawlersEsamRabbitModel $adFactoryCrawlersEsamRabbitModel;
    private AMQPChannel $adFactoryCrawlersEsamRabbitChannel;

    private AdFactoryCrawlersBodySpinnerRabbitModel $adFactoryCrawlersBodySpinnerRabbitModel;
    private AMQPChannel $adFactoryCrawlersBodySpinnerRabbitChannel;

    private AdFactoryCrawlersZhiyarRabbitModel $adFactoryCrawlersZhiyarRabbitModel;
    private AMQPChannel $adFactoryCrawlersZhiyarRabbitChannel;

    private AdFactoryCrawlersZhaketRabbitModel $adFactoryCrawlersZhaketRabbitModel;
    private AMQPChannel $adFactoryCrawlersZhaketRabbitChannel;

    private AdFactoryCrawlersMelliShoesRabbitModel $adFactoryCrawlersMelliShoesRabbitModel;
    private AMQPChannel $adFactoryCrawlersMelliShoesRabbitChannel;

    private AdFactoryCrawlersEseminarRabbitModel $adFactoryCrawlersEseminarRabbitModel;
    private AMQPChannel $adFactoryCrawlersEseminarRabbitChannel;

    private AdFactoryCrawlersIranmrcarpetRabbitModel $adFactoryCrawlersIranmrcarpetRabbitModel;
    private AMQPChannel $adFactoryCrawlersIranmrcarpetRabbitChannel;

    private AdFactoryCrawlersMartoRabbitModel $adFactoryCrawlersMartoRabbitModel;
    private AMQPChannel $adFactoryCrawlersMartoRabbitChannel;

    private AdFactoryCrawlersJeaniranshopRabbitModel $adFactoryCrawlersJeaniranshopRabbitModel;
    private AMQPChannel $adFactoryCrawlersJeaniranshopRabbitChannel;

    private AdFactoryCrawlersVitrinezibaRabbitModel $adFactoryCrawlersVitrinezibaRabbitModel;
    private AMQPChannel $adFactoryCrawlersVitrinezibaRabbitChannel;

    private AdFactoryCrawlersBatteriesRabbitModel $adFactoryCrawlersBatteriesRabbitModel;
    private AMQPChannel $adFactoryCrawlersBatteriesRabbitChannel;

    private AdFactoryCrawlersBornosmodeRabbitModel $adFactoryCrawlersBornosmodeRabbitModel;
    private AMQPChannel $adFactoryCrawlersBornosmodeRabbitChannel;

    private AdFactoryCrawlersBarjilRabbitModel $adFactoryCrawlersBarjilRabbitModel;
    private AMQPChannel $adFactoryCrawlersBarjilRabbitChannel;

    private AdFactoryCrawlersShopsabzRabbitModel $adFactoryCrawlersShopsabzRabbitModel;
    private AMQPChannel $adFactoryCrawlersShopsabzRabbitChannel;

    private AdFactoryCrawlersDigiberoozRabbitModel $adFactoryCrawlersDigiberoozRabbitModel;
    private AMQPChannel $adFactoryCrawlersDigiberoozRabbitChannel;

    private AdFactoryCrawlersRtlthemeRabbitModel $adFactoryCrawlersRtlthemeRabbitModel;
    private AMQPChannel $adFactoryCrawlersRtlthemeRabbitChannel;

    private AdFactoryCrawlersBasalamRabbitModel $adFactoryCrawlersBasalamRabbitModel;
    private AMQPChannel $adFactoryCrawlersBasalamRabbitChannel;

    private AdFactoryCrawlersNoornegarRabbitModel $adFactoryCrawlersNoornegarRabbitModel;
    private AMQPChannel $adFactoryCrawlersNoornegarRabbitChannel;

    private AdFactoryCrawlersWinmarketRabbitModel $adFactoryCrawlersWinmarketRabbitModel;
    private AMQPChannel $adFactoryCrawlersWinmarketRabbitChannel;

    private AdFactoryCrawlersShahrsaatRabbitModel $adFactoryCrawlersShahrsaatRabbitModel;
    private AMQPChannel $adFactoryCrawlersShahrsaatRabbitChannel;

    private AdFactoryCrawlersFafaitRabbitModel $adFactoryCrawlersFafaitRabbitModel;
    private AMQPChannel $adFactoryCrawlersFafaitRabbitChannel;

    private AdFactoryCrawlersSnappmarketRabbitModel $adFactoryCrawlersSnappmarketRabbitModel;
    private AMQPChannel $adFactoryCrawlersSnappmarketRabbitChannel;

    private AdFactoryCrawlersGanjipakhshRabbitModel $adFactoryCrawlersGanjipakhshRabbitModel;
    private AMQPChannel $adFactoryCrawlersGanjipakhshRabbitChannel;

    private AdFactoryCrawlersShabjomeRabbitModel $adFactoryCrawlersShabjomeRabbitModel;
    private AMQPChannel $adFactoryCrawlersShabjomeRabbitChannel;

    private AdFactoryCrawlersLohegostareshRabbitModel $adFactoryCrawlersLohegostareshRabbitModel;
    private AMQPChannel $adFactoryCrawlersLohegostareshRabbitChannel;

    private AdFactoryCrawlersDanielleeiranRabbitModel $adFactoryCrawlersDanielleeiranRabbitModel;
    private AMQPChannel $adFactoryCrawlersDanielleeiranRabbitChannel;

    private AdFactoryCrawlersYaarmedRabbitModel $adFactoryCrawlersYaarmedRabbitModel;
    private AMQPChannel $adFactoryCrawlersYaarmedRabbitChannel;

    private AdFactoryCrawlersVitrinnetRabbitModel $adFactoryCrawlersVitrinnetRabbitModel;
    private AMQPChannel $adFactoryCrawlersVitrinnetRabbitChannel;

    private AdFactoryCrawlersJimboshopRabbitModel $adFactoryCrawlersJimboshopRabbitModel;
    private AMQPChannel $adFactoryCrawlersJimboshopRabbitChannel;

    private AdFactoryCrawlersTexnoliRabbitModel $adFactoryCrawlersTexnoliRabbitModel;
    private AMQPChannel $adFactoryCrawlersTexnoliRabbitChannel;

    private AdFactoryCrawlersJavanbakhtgoldRabbitModel $adFactoryCrawlersJavanbakhtgoldRabbitModel;
    private AMQPChannel $adFactoryCrawlersJavanbakhtgoldRabbitChannel;

    private AdFactoryCrawlersSabzimanRabbitModel $adFactoryCrawlersSabzimanRabbitModel;
    private AMQPChannel $adFactoryCrawlersSabzimanRabbitChannel;

    private AdFactoryCrawlersDekomajRabbitModel $adFactoryCrawlersDekomajRabbitModel;
    private AMQPChannel $adFactoryCrawlersDekomajRabbitChannel;

    private AdFactoryCrawlersBidopinRabbitModel $adFactoryCrawlersBidopinRabbitModel;
    private AMQPChannel $adFactoryCrawlersBidopinRabbitChannel;

    private AdFactoryCrawlersMashinnoRabbitModel $adFactoryCrawlersMashinnoRabbitModel;
    private AMQPChannel $adFactoryCrawlersMashinnoRabbitChannel;

    private AdFactoryCrawlersNiluxRabbitModel $adFactoryCrawlersNiluxRabbitModel;
    private AMQPChannel $adFactoryCrawlersNiluxRabbitChannel;

    private AdFactoryCrawlersVistorRabbitModel $adFactoryCrawlersVistorRabbitModel;
    private AMQPChannel $adFactoryCrawlersVistorRabbitChannel;

    private AdFactoryCrawlersLoziRabbitModel $adFactoryCrawlersLoziRabbitModel;
    private AMQPChannel $adFactoryCrawlersLoziRabbitChannel;

    private AdFactoryCrawlersKharidkala24RabbitModel $adFactoryCrawlersKharidkala24RabbitModel;
    private AMQPChannel $adFactoryCrawlersKharidkala24RabbitChannel;

    private AdFactoryCrawlersSana3dRabbitModel $adFactoryCrawlersSana3dRabbitModel;
    private AMQPChannel $adFactoryCrawlersSana3dRabbitChannel;

    private AdFactoryCrawlersKetablandRabbitModel $adFactoryCrawlersKetablandRabbitModel;
    private AMQPChannel $adFactoryCrawlersKetablandRabbitChannel;

    private AdFactoryCrawlersMajeurshawlRabbitModel $adFactoryCrawlersMajeurshawlRabbitModel;
    private AMQPChannel $adFactoryCrawlersMajeurshawlRabbitChannel;

    private AdFactoryCrawlersTarisgoldRabbitModel $adFactoryCrawlersTarisgoldRabbitModel;
    private AMQPChannel $adFactoryCrawlersTarisgoldRabbitChannel;

    private AdFactoryCrawlersTirdadhomeRabbitModel $adFactoryCrawlersTirdadhomeRabbitModel;
    private AMQPChannel $adFactoryCrawlersTirdadhomeRabbitChannel;

    private AdFactoryCrawlersKalavarzeshRabbitModel $adFactoryCrawlersKalavarzeshRabbitModel;
    private AMQPChannel $adFactoryCrawlersKalavarzeshRabbitChannel;

    private AdFactoryCrawlersParstinaRabbitModel $adFactoryCrawlersParstinaRabbitModel;
    private AMQPChannel $adFactoryCrawlersParstinaRabbitChannel;

    private AdFactoryCrawlersKhanoumiRabbitModel $adFactoryCrawlersKhanoumiRabbitModel;
    private AMQPChannel $adFactoryCrawlersKhanoumiRabbitChannel;

    private AdFactoryCrawlersChapaghaRabbitModel $adFactoryCrawlersChapaghaRabbitModel;
    private AMQPChannel $adFactoryCrawlersChapaghaRabbitChannel;

    private AdFactoryCrawlersSetmenRabbitModel $adFactoryCrawlersSetmenRabbitModel;
    private AMQPChannel $adFactoryCrawlersSetmenRabbitChannel;

    private AdFactoryCrawlersWatchonlineRabbitModel $adFactoryCrawlersWatchonlineRabbitModel;
    private AMQPChannel $adFactoryCrawlersWatchonlineRabbitChannel;

    private AdFactoryCrawlersIransporterRabbitModel $adFactoryCrawlersIransporterRabbitModel;
    private AMQPChannel $adFactoryCrawlersIransporterRabbitChannel;

    private AdFactoryCrawlersCartonsabzRabbitModel $adFactoryCrawlersCartonsabzRabbitModel;
    private AMQPChannel $adFactoryCrawlersCartonsabzRabbitChannel;

    private AdFactoryCrawlersManilooRabbitModel $adFactoryCrawlersManilooRabbitModel;
    private AMQPChannel $adFactoryCrawlersManilooRabbitChannel;

    private AdFactoryCrawlersKhaneyenoRabbitModel $adFactoryCrawlersKhaneyenoRabbitModel;
    private AMQPChannel $adFactoryCrawlersKhaneyenoRabbitChannel;

    private AdFactoryCrawlersKalatikRabbitModel $adFactoryCrawlersKalatikRabbitModel;
    private AMQPChannel $adFactoryCrawlersKalatikRabbitChannel;

    private AdFactoryCrawlersAtrumeRabbitModel $adFactoryCrawlersAtrumeRabbitModel;
    private AMQPChannel $adFactoryCrawlersAtrumeRabbitChannel;

    private AdFactoryCrawlersPasariaRabbitModel $adFactoryCrawlersPasariaRabbitModel;
    private AMQPChannel $adFactoryCrawlersPasariaRabbitChannel;

    private AdFactoryCrawlersAfrangdigitalRabbitModel $adFactoryCrawlersAfrangdigitalRabbitModel;
    private AMQPChannel $adFactoryCrawlersAfrangdigitalRabbitChannel;

    private AdFactoryCrawlersLipakRabbitModel $adFactoryCrawlersLipakRabbitModel;
    private AMQPChannel $adFactoryCrawlersLipakRabbitChannel;

    private AdFactoryCrawlersPelazioRabbitModel $adFactoryCrawlersPelazioRabbitModel;
    private AMQPChannel $adFactoryCrawlersPelazioRabbitChannel;

    private AdFactoryCrawlersDaneshlandRabbitModel $adFactoryCrawlersDaneshlandRabbitModel;
    private AMQPChannel $adFactoryCrawlersDaneshlandRabbitChannel;

    private AdFactoryCrawlersBishtarazyekRabbitModel $adFactoryCrawlersBishtarazyekRabbitModel;
    private AMQPChannel $adFactoryCrawlersBishtarazyekRabbitChannel;

    private AdFactoryCrawlersZoobitechRabbitModel $adFactoryCrawlersZoobitechRabbitModel;
    private AMQPChannel $adFactoryCrawlersZoobitechRabbitChannel;


    private AdFactoryCrawlersAghayesangiRabbitModel $adFactoryCrawlersAghayesangiRabbitModel;
    private AMQPChannel $adFactoryCrawlersAghayesangiRabbitChannel;

    private AdFactoryCrawlersBornaShoRabbitModel $adFactoryCrawlersBornaShoRabbitModel;
    private AMQPChannel $adFactoryCrawlersBornaShoRabbitChannel;

    private AdFactoryCrawlersRoshapharmacyRabbitModel $adFactoryCrawlersRoshapharmacyRabbitModel;
    private AMQPChannel $adFactoryCrawlersRoshapharmacyRabbitChannel;

    private AdFactoryCrawlersNamayandeyabRabbitModel $adFactoryCrawlersNamayandeyabRabbitModel;
    private AMQPChannel $adFactoryCrawlersNamayandeyabRabbitChannel;

    private AdFactoryCrawlersDeydigitalRabbitModel $adFactoryCrawlersDeydigitalRabbitModel;
    private AMQPChannel $adFactoryCrawlersDeydigitalRabbitChannel;

    private AdFactoryCrawlersVenkaRabbitModel $adFactoryCrawlersVenkaRabbitModel;
    private AMQPChannel $adFactoryCrawlersVenkaRabbitChannel;

    private AdFactoryCrawlersBehinminerRabbitModel $adFactoryCrawlersBehinminerRabbitModel;
    private AMQPChannel $adFactoryCrawlersBehinminerRabbitChannel;

    private AdFactoryCrawlersIdebookRabbitModel $adFactoryCrawlersIdebookRabbitModel;
    private AMQPChannel $adFactoryCrawlersIdebookRabbitChannel;

    private AdFactoryCrawlersHomsaRabbitModel $adFactoryCrawlersHomsaRabbitModel;
    private AMQPChannel $adFactoryCrawlersHomsaRabbitChannel;

    private AdFactoryCrawlersMahfamshopRabbitModel $adFactoryCrawlersMahfamshopRabbitModel;
    private AMQPChannel $adFactoryCrawlersMahfamshopRabbitChannel;

    private AdFactoryCrawlersShahreketabonlineRabbitModel $adFactoryCrawlersShahreketabonlineRabbitModel;
    private AMQPChannel $adFactoryCrawlersShahreketabonlineRabbitChannel;

    private AdFactoryUserPagesRabbitModel $adFactoryUserPagesRabbitModel;
    private AMQPChannel $adFactoryUserPagesRabbitChannel;

    private AdFactoryCrawlersAsroonRabbitModel $adFactoryCrawlersAsroonRabbitModel;
    private AMQPChannel $adFactoryCrawlersAsroonRabbitChannel;
    
    private AdFactoryCrawlersRubikRabbitModel $adFactoryCrawlersRubikRabbitModel;
    private AMQPChannel $adFactoryCrawlersRubikRabbitChannel;
    
    private AdFactoryCrawlersMoeinsoftRabbitModel $adFactoryCrawlersMoeinsoftRabbitModel;
    private AMQPChannel $adFactoryCrawlersMoeinsoftRabbitChannel;
    //last_prop
    //ATTENTION : please do not remove above comment this is a flag for crawler generator

    private $channel;
    private $uSleep;
    private $companyLogger;
    private $startTime;

    /**
     * UserPagesLibrary constructor.
     * @param AdFactoryUserPagesRabbitModel $adFactoryUserPagesRabbitModel
     * @param AdFactoryCrawlersSchemaRabbitModel $adFactoryCrawlersSchemaRabbitModel
     * @param AdFactoryCrawlersBanimodeRabbitModel $adFactoryCrawlersBanimodeRabbitModel
     * @param AdFactoryCrawlersBonakchiRabbitModel $adFactoryCrawlersBonakchiRabbitModel
     * @param AdFactoryCrawlersEsamRabbitModel $adFactoryCrawlersEsamRabbitModel
     * @param AdFactoryCrawlersBodySpinnerRabbitModel $adFactoryCrawlersBodySpinnerRabbitModel
     * @param AdFactoryCrawlersZhiyarRabbitModel $adFactoryCrawlersZhiyarRabbitModel
     * @param AdFactoryCrawlersZhaketRabbitModel $adFactoryCrawlersZhaketRabbitModel
     * @param AdFactoryCrawlersMelliShoesRabbitModel $adFactoryCrawlersMelliShoesRabbitModel
     * @param AdFactoryCrawlersEseminarRabbitModel $adFactoryCrawlersEseminarRabbitModel
     * @param AdFactoryCrawlersIranmrcarpetRabbitModel $adFactoryCrawlersIranmrcarpetRabbitModel
     * @param AdFactoryCrawlersMartoRabbitModel $adFactoryCrawlersMartoRabbitModel
     * @param AdFactoryCrawlersJeaniranshopRabbitModel $adFactoryCrawlersJeaniranshopRabbitModel
     * @param AdFactoryCrawlersVitrinezibaRabbitModel $adFactoryCrawlersVitrinezibaRabbitModel
     * @param AdFactoryCrawlersBatteriesRabbitModel $adFactoryCrawlersBatteriesRabbitModel
     * @param AdFactoryCrawlersBornosmodeRabbitModel $adFactoryCrawlersBornosmodeRabbitModel
     * @param AdFactoryCrawlersBarjilRabbitModel $adFactoryCrawlersBarjilRabbitModel
     * @param AdFactoryCrawlersShopsabzRabbitModel $adFactoryCrawlersShopsabzRabbitModel
     * @param AdFactoryCrawlersDigiberoozRabbitModel $adFactoryCrawlersDigiberoozRabbitModel
     * @param AdFactoryCrawlersRtlthemeRabbitModel $adFactoryCrawlersRtlthemeRabbitModel
     * @param AdFactoryCrawlersBasalamRabbitModel $adFactoryCrawlersBasalamRabbitModel
     * @param AdFactoryCrawlersNoornegarRabbitModel $adFactoryCrawlersNoornegarRabbitModel
     * @param AdFactoryCrawlersWinmarketRabbitModel $adFactoryCrawlersWinmarketRabbitModel
     * @param AdFactoryCrawlersShahrsaatRabbitModel $adFactoryCrawlersShahrsaatRabbitModel
     * @param AdFactoryCrawlersFafaitRabbitModel $adFactoryCrawlersFafaitRabbitModel
     * @param AdFactoryCrawlersSnappmarketRabbitModel $adFactoryCrawlersSnappmarketRabbitModel
     * @param AdFactoryCrawlersGanjipakhshRabbitModel $adFactoryCrawlersGanjipakhshRabbitModel
     * @param AdFactoryCrawlersShabjomeRabbitModel $adFactoryCrawlersShabjomeRabbitModel
     * @param AdFactoryCrawlersLohegostareshRabbitModel $adFactoryCrawlersLohegostareshRabbitModel
     * @param AdFactoryCrawlersDanielleeiranRabbitModel $adFactoryCrawlersDanielleeiranRabbitModel
     * @param AdFactoryCrawlersYaarmedRabbitModel $adFactoryCrawlersYaarmedRabbitModel
     * @param AdFactoryCrawlersVitrinnetRabbitModel $adFactoryCrawlersVitrinnetRabbitModel
     * @param AdFactoryCrawlersJimboshopRabbitModel $adFactoryCrawlersJimboshopRabbitModel
     * @param AdFactoryCrawlersTexnoliRabbitModel $adFactoryCrawlersTexnoliRabbitModel
     * @param AdFactoryCrawlersJavanbakhtgoldRabbitModel $adFactoryCrawlersJavanbakhtgoldRabbitModel
     * @param AdFactoryCrawlersSabzimanRabbitModel $adFactoryCrawlersSabzimanRabbitModel
     * @param AdFactoryCrawlersDekomajRabbitModel $adFactoryCrawlersDekomajRabbitModel
     * @param AdFactoryCrawlersBidopinRabbitModel $adFactoryCrawlersBidopinRabbitModel
     * @param AdFactoryCrawlersMashinnoRabbitModel $adFactoryCrawlersMashinnoRabbitModel
     * @param AdFactoryCrawlersNiluxRabbitModel $adFactoryCrawlersNiluxRabbitModel
     * @param AdFactoryCrawlersVistorRabbitModel $adFactoryCrawlersVistorRabbitModel
     * @param AdFactoryCrawlersLoziRabbitModel $adFactoryCrawlersLoziRabbitModel
     * @param AdFactoryCrawlersKharidkala24RabbitModel $adFactoryCrawlersKharidkala24RabbitModel
     * @param AdFactoryCrawlersSana3dRabbitModel $adFactoryCrawlersSana3dRabbitModel
     * @param AdFactoryCrawlersKetablandRabbitModel $adFactoryCrawlersKetablandRabbitModel
     * @param AdFactoryCrawlersMajeurshawlRabbitModel $adFactoryCrawlersMajeurshawlRabbitModel
     * @param AdFactoryCrawlersTarisgoldRabbitModel $adFactoryCrawlersTarisgoldRabbitModel
     * @param AdFactoryCrawlersTirdadhomeRabbitModel $adFactoryCrawlersTirdadhomeRabbitModel
     * @param AdFactoryCrawlersKalavarzeshRabbitModel $adFactoryCrawlersKalavarzeshRabbitModel
     * @param AdFactoryCrawlersParstinaRabbitModel $adFactoryCrawlersParstinaRabbitModel
     * @param AdFactoryCrawlersKhanoumiRabbitModel $adFactoryCrawlersKhanoumiRabbitModel
     * @param AdFactoryCrawlersChapaghaRabbitModel $adFactoryCrawlersChapaghaRabbitModel
     * @param AdFactoryCrawlersSetmenRabbitModel $adFactoryCrawlersSetmenRabbitModel
     * @param AdFactoryCrawlersWatchonlineRabbitModel $adFactoryCrawlersWatchonlineRabbitModel
     * @param AdFactoryCrawlersIransporterRabbitModel $adFactoryCrawlersIransporterRabbitModel
     * @param AdFactoryCrawlersCartonsabzRabbitModel $adFactoryCrawlersCartonsabzRabbitModel
     * @param AdFactoryCrawlersManilooRabbitModel $adFactoryCrawlersManilooRabbitModel
     * @param AdFactoryCrawlersKhaneyenoRabbitModel $adFactoryCrawlersKhaneyenoRabbitModel
     * @param AdFactoryCrawlersKalatikRabbitModel $adFactoryCrawlersKalatikRabbitModel
     * @param AdFactoryCrawlersAtrumeRabbitModel $adFactoryCrawlersAtrumeRabbitModel
     * @param AdFactoryCrawlersPasariaRabbitModel $adFactoryCrawlersPasariaRabbitModel
     * @param AdFactoryCrawlersAfrangdigitalRabbitModel $adFactoryCrawlersAfrangdigitalRabbitModel
     * @param AdFactoryCrawlersLipakRabbitModel $adFactoryCrawlersLipakRabbitModel
     * @param AdFactoryCrawlersPelazioRabbitModel $adFactoryCrawlersPelazioRabbitModel
     * @param AdFactoryCrawlersBishtarazyekRabbitModel $adFactoryCrawlersBishtarazyekRabbitModel
     * @param AdFactoryCrawlersDaneshlandRabbitModel $adFactoryCrawlersDaneshlandRabbitModel
     * @param AdFactoryCrawlersZoobitechRabbitModel $adFactoryCrawlersZoobitechRabbitModel
     * @param AdFactoryCrawlersRoshapharmacyRabbitModel $adFactoryCrawlersRoshapharmacyRabbitModel
     * @param AdFactoryCrawlersDobisellRabbitModel $adFactoryCrawlersDobisellRabbitModel
     * @param AdFactoryCrawlersAghayesangiRabbitModel $adFactoryCrawlersAghayesangiRabbitModel
     * @param AdFactoryCrawlersBornaShoRabbitModel $adFactoryCrawlersBornaShoRabbitModel
     * @param AdFactoryCrawlersNamayandeyabRabbitModel $adFactoryCrawlersNamayandeyabRabbitModel
     * @param AdFactoryCrawlersDeydigitalRabbitModel $adFactoryCrawlersDeydigitalRabbitModel
     * @param AdFactoryCrawlersVenkaRabbitModel $adFactoryCrawlersVenkaRabbitModel
     * @param AdFactoryCrawlersBehinminerRabbitModel $adFactoryCrawlersBehinminerRabbitModel
     * @param AdFactoryCrawlersIdebookRabbitModel $adFactoryCrawlersIdebookRabbitModel
     * @param AdFactoryCrawlersHomsaRabbitModel $adFactoryCrawlersHomsaRabbitModel
     * @param AdFactoryCrawlersAsroonRabbitModel $adFactoryCrawlersAsroonRabbitModel
     * @param AdFactoryCrawlersMahfamshopRabbitModel $adFactoryCrawlersMahfamshopRabbitModel
     * @param AdFactoryCrawlersShahreketabonlineRabbitModel $adFactoryCrawlersShahreketabonlineRabbitModel
     * @param AdFactoryCrawlersRubikRabbitModel $adFactoryCrawlersRubikRabbitModel
     * @param AdFactoryCrawlersMoeinsoftRabbitModel $adFactoryCrawlersMoeinsoftRabbitModel
     * last_doc
     * ATTENTION : please do not remove above comment this is a flag for crawler generator
     * @param companyLogger $companyLogger
     */
    public function __construct(AdFactoryUserPagesRabbitModel $adFactoryUserPagesRabbitModel,
                                AdFactoryCrawlersSchemaRabbitModel $adFactoryCrawlersSchemaRabbitModel,
                                AdFactoryCrawlersBanimodeRabbitModel $adFactoryCrawlersBanimodeRabbitModel,
                                AdFactoryCrawlersBonakchiRabbitModel $adFactoryCrawlersBonakchiRabbitModel,
                                AdFactoryCrawlersEsamRabbitModel $adFactoryCrawlersEsamRabbitModel,
                                AdFactoryCrawlersBodySpinnerRabbitModel $adFactoryCrawlersBodySpinnerRabbitModel,
                                AdFactoryCrawlersZhiyarRabbitModel $adFactoryCrawlersZhiyarRabbitModel,
                                AdFactoryCrawlersZhaketRabbitModel $adFactoryCrawlersZhaketRabbitModel,
                                AdFactoryCrawlersMelliShoesRabbitModel $adFactoryCrawlersMelliShoesRabbitModel,
                                AdFactoryCrawlersEseminarRabbitModel $adFactoryCrawlersEseminarRabbitModel,
                                AdFactoryCrawlersIranmrcarpetRabbitModel $adFactoryCrawlersIranmrcarpetRabbitModel,
                                AdFactoryCrawlersMartoRabbitModel $adFactoryCrawlersMartoRabbitModel,
                                AdFactoryCrawlersJeaniranshopRabbitModel $adFactoryCrawlersJeaniranshopRabbitModel,
                                AdFactoryCrawlersVitrinezibaRabbitModel $adFactoryCrawlersVitrinezibaRabbitModel,
                                AdFactoryCrawlersBatteriesRabbitModel $adFactoryCrawlersBatteriesRabbitModel,
                                AdFactoryCrawlersBornosmodeRabbitModel $adFactoryCrawlersBornosmodeRabbitModel,
                                AdFactoryCrawlersBarjilRabbitModel $adFactoryCrawlersBarjilRabbitModel,
                                AdFactoryCrawlersShopsabzRabbitModel $adFactoryCrawlersShopsabzRabbitModel,
                                AdFactoryCrawlersDigiberoozRabbitModel $adFactoryCrawlersDigiberoozRabbitModel,
                                AdFactoryCrawlersRtlthemeRabbitModel $adFactoryCrawlersRtlthemeRabbitModel,
                                AdFactoryCrawlersBasalamRabbitModel $adFactoryCrawlersBasalamRabbitModel,
                                AdFactoryCrawlersNoornegarRabbitModel $adFactoryCrawlersNoornegarRabbitModel,
                                AdFactoryCrawlersWinmarketRabbitModel $adFactoryCrawlersWinmarketRabbitModel,
                                AdFactoryCrawlersShahrsaatRabbitModel $adFactoryCrawlersShahrsaatRabbitModel,
                                AdFactoryCrawlersFafaitRabbitModel $adFactoryCrawlersFafaitRabbitModel,
                                AdFactoryCrawlersSnappmarketRabbitModel $adFactoryCrawlersSnappmarketRabbitModel,
                                AdFactoryCrawlersGanjipakhshRabbitModel $adFactoryCrawlersGanjipakhshRabbitModel,
                                AdFactoryCrawlersShabjomeRabbitModel $adFactoryCrawlersShabjomeRabbitModel,
                                AdFactoryCrawlersLohegostareshRabbitModel $adFactoryCrawlersLohegostareshRabbitModel,
                                AdFactoryCrawlersDanielleeiranRabbitModel $adFactoryCrawlersDanielleeiranRabbitModel,
                                AdFactoryCrawlersYaarmedRabbitModel $adFactoryCrawlersYaarmedRabbitModel,
                                AdFactoryCrawlersVitrinnetRabbitModel $adFactoryCrawlersVitrinnetRabbitModel,
                                AdFactoryCrawlersJimboshopRabbitModel $adFactoryCrawlersJimboshopRabbitModel,
                                AdFactoryCrawlersTexnoliRabbitModel $adFactoryCrawlersTexnoliRabbitModel,
                                AdFactoryCrawlersJavanbakhtgoldRabbitModel $adFactoryCrawlersJavanbakhtgoldRabbitModel,
                                AdFactoryCrawlersSabzimanRabbitModel $adFactoryCrawlersSabzimanRabbitModel,
                                AdFactoryCrawlersDekomajRabbitModel $adFactoryCrawlersDekomajRabbitModel,
                                AdFactoryCrawlersBidopinRabbitModel $adFactoryCrawlersBidopinRabbitModel,
                                AdFactoryCrawlersMashinnoRabbitModel $adFactoryCrawlersMashinnoRabbitModel,
                                AdFactoryCrawlersNiluxRabbitModel $adFactoryCrawlersNiluxRabbitModel,
                                AdFactoryCrawlersVistorRabbitModel $adFactoryCrawlersVistorRabbitModel,
                                AdFactoryCrawlersLoziRabbitModel $adFactoryCrawlersLoziRabbitModel,
                                AdFactoryCrawlersKharidkala24RabbitModel $adFactoryCrawlersKharidkala24RabbitModel,
                                AdFactoryCrawlersSana3dRabbitModel $adFactoryCrawlersSana3dRabbitModel,
                                AdFactoryCrawlersKetablandRabbitModel $adFactoryCrawlersKetablandRabbitModel,
                                AdFactoryCrawlersMajeurshawlRabbitModel $adFactoryCrawlersMajeurshawlRabbitModel,
                                AdFactoryCrawlersTarisgoldRabbitModel $adFactoryCrawlersTarisgoldRabbitModel,
                                AdFactoryCrawlersTirdadhomeRabbitModel $adFactoryCrawlersTirdadhomeRabbitModel,
                                AdFactoryCrawlersKalavarzeshRabbitModel $adFactoryCrawlersKalavarzeshRabbitModel,
                                AdFactoryCrawlersParstinaRabbitModel $adFactoryCrawlersParstinaRabbitModel,
                                AdFactoryCrawlersKhanoumiRabbitModel $adFactoryCrawlersKhanoumiRabbitModel,
                                AdFactoryCrawlersChapaghaRabbitModel $adFactoryCrawlersChapaghaRabbitModel,
                                AdFactoryCrawlersSetmenRabbitModel $adFactoryCrawlersSetmenRabbitModel,
                                AdFactoryCrawlersWatchonlineRabbitModel $adFactoryCrawlersWatchonlineRabbitModel,
                                AdFactoryCrawlersIransporterRabbitModel $adFactoryCrawlersIransporterRabbitModel,
                                AdFactoryCrawlersCartonsabzRabbitModel $adFactoryCrawlersCartonsabzRabbitModel,
                                AdFactoryCrawlersManilooRabbitModel $adFactoryCrawlersManilooRabbitModel,
                                AdFactoryCrawlersKhaneyenoRabbitModel $adFactoryCrawlersKhaneyenoRabbitModel,
                                AdFactoryCrawlersKalatikRabbitModel $adFactoryCrawlersKalatikRabbitModel,
                                AdFactoryCrawlersAtrumeRabbitModel $adFactoryCrawlersAtrumeRabbitModel,
                                AdFactoryCrawlersPasariaRabbitModel $adFactoryCrawlersPasariaRabbitModel,
                                AdFactoryCrawlersAfrangdigitalRabbitModel $adFactoryCrawlersAfrangdigitalRabbitModel,
                                AdFactoryCrawlersLipakRabbitModel $adFactoryCrawlersLipakRabbitModel,
                                AdFactoryCrawlersPelazioRabbitModel $adFactoryCrawlersPelazioRabbitModel,
                                AdFactoryCrawlersBishtarazyekRabbitModel $adFactoryCrawlersBishtarazyekRabbitModel,
                                AdFactoryCrawlersDaneshlandRabbitModel $adFactoryCrawlersDaneshlandRabbitModel,
                                AdFactoryCrawlersZoobitechRabbitModel $adFactoryCrawlersZoobitechRabbitModel,
                                AdFactoryCrawlersRoshapharmacyRabbitModel $adFactoryCrawlersRoshapharmacyRabbitModel,
                                AdFactoryCrawlersDobisellRabbitModel $adFactoryCrawlersDobisellRabbitModel,
                                AdFactoryCrawlersAghayesangiRabbitModel $adFactoryCrawlersAghayesangiRabbitModel,
                                AdFactoryCrawlersBornaShoRabbitModel $adFactoryCrawlersBornaShoRabbitModel,
                                AdFactoryCrawlersNamayandeyabRabbitModel $adFactoryCrawlersNamayandeyabRabbitModel,
                                AdFactoryCrawlersDeydigitalRabbitModel $adFactoryCrawlersDeydigitalRabbitModel,
                                AdFactoryCrawlersVenkaRabbitModel $adFactoryCrawlersVenkaRabbitModel,
                                AdFactoryCrawlersBehinminerRabbitModel $adFactoryCrawlersBehinminerRabbitModel,
                                AdFactoryCrawlersIdebookRabbitModel $adFactoryCrawlersIdebookRabbitModel,
                                AdFactoryCrawlersHomsaRabbitModel $adFactoryCrawlersHomsaRabbitModel,
                                AdFactoryCrawlersAsroonRabbitModel $adFactoryCrawlersAsroonRabbitModel,
                                AdFactoryCrawlersMahfamshopRabbitModel $adFactoryCrawlersMahfamshopRabbitModel,
                                AdFactoryCrawlersShahreketabonlineRabbitModel $adFactoryCrawlersShahreketabonlineRabbitModel,
                                AdFactoryCrawlersRubikRabbitModel $adFactoryCrawlersRubikRabbitModel,
                                AdFactoryCrawlersMoeinsoftRabbitModel $adFactoryCrawlersMoeinsoftRabbitModel,
                                //last_arg
                                //ATTENTION : please do not remove above comment this is a flag for crawler generator
                                companyLogger $companyLogger
        ) {
        $this->adFactoryUserPagesRabbitModel = $adFactoryUserPagesRabbitModel;
        $this->adFactoryUserPagesRabbitChannel = $adFactoryUserPagesRabbitModel->getChannel();

        $this->adFactoryCrawlersSchemaRabbitModel = $adFactoryCrawlersSchemaRabbitModel;
        $this->adFactoryCrawlersSchemaRabbitChannel = $adFactoryCrawlersSchemaRabbitModel->getChannel();

        $this->adFactoryCrawlersBanimodeRabbitModel = $adFactoryCrawlersBanimodeRabbitModel;
        $this->adFactoryCrawlersBanimodeRabbitChannel = $adFactoryCrawlersBanimodeRabbitModel->getChannel();

        $this->adFactoryCrawlersBonakchiRabbitModel = $adFactoryCrawlersBonakchiRabbitModel;
        $this->adFactoryCrawlersBonakchiRabbitChannel = $adFactoryCrawlersBonakchiRabbitModel->getChannel();

        $this->adFactoryCrawlersEsamRabbitModel = $adFactoryCrawlersEsamRabbitModel;
        $this->adFactoryCrawlersEsamRabbitChannel = $adFactoryCrawlersEsamRabbitModel->getChannel();

        $this->adFactoryCrawlersBodySpinnerRabbitModel = $adFactoryCrawlersBodySpinnerRabbitModel;
        $this->adFactoryCrawlersBodySpinnerRabbitChannel = $adFactoryCrawlersBodySpinnerRabbitModel->getChannel();

        $this->adFactoryCrawlersZhiyarRabbitModel = $adFactoryCrawlersZhiyarRabbitModel;
        $this->adFactoryCrawlersZhiyarRabbitChannel = $adFactoryCrawlersZhiyarRabbitModel->getChannel();

        $this->adFactoryCrawlersZhaketRabbitModel = $adFactoryCrawlersZhaketRabbitModel;
        $this->adFactoryCrawlersZhaketRabbitChannel = $adFactoryCrawlersZhaketRabbitModel->getChannel();

        $this->adFactoryCrawlersMelliShoesRabbitModel = $adFactoryCrawlersMelliShoesRabbitModel;
        $this->adFactoryCrawlersMelliShoesRabbitChannel = $adFactoryCrawlersMelliShoesRabbitModel->getChannel();

        $this->adFactoryCrawlersEseminarRabbitModel = $adFactoryCrawlersEseminarRabbitModel;
        $this->adFactoryCrawlersEseminarRabbitChannel = $adFactoryCrawlersEseminarRabbitModel->getChannel();

        $this->adFactoryCrawlersIranmrcarpetRabbitModel = $adFactoryCrawlersIranmrcarpetRabbitModel;
        $this->adFactoryCrawlersIranmrcarpetRabbitChannel = $adFactoryCrawlersIranmrcarpetRabbitModel->getChannel();

        $this->adFactoryCrawlersMartoRabbitModel = $adFactoryCrawlersMartoRabbitModel;
        $this->adFactoryCrawlersMartoRabbitChannel = $adFactoryCrawlersMartoRabbitModel->getChannel();

        $this->adFactoryCrawlersJeaniranshopRabbitModel = $adFactoryCrawlersJeaniranshopRabbitModel;
        $this->adFactoryCrawlersJeaniranshopRabbitChannel = $adFactoryCrawlersJeaniranshopRabbitModel->getChannel();

        $this->adFactoryCrawlersVitrinezibaRabbitModel = $adFactoryCrawlersVitrinezibaRabbitModel;
        $this->adFactoryCrawlersVitrinezibaRabbitChannel = $adFactoryCrawlersVitrinezibaRabbitModel->getChannel();

        $this->adFactoryCrawlersBatteriesRabbitModel = $adFactoryCrawlersBatteriesRabbitModel;
        $this->adFactoryCrawlersBatteriesRabbitChannel = $adFactoryCrawlersBatteriesRabbitModel->getChannel();

        $this->adFactoryCrawlersBornosmodeRabbitModel = $adFactoryCrawlersBornosmodeRabbitModel;
        $this->adFactoryCrawlersBornosmodeRabbitChannel = $adFactoryCrawlersBornosmodeRabbitModel->getChannel();

        $this->adFactoryCrawlersBarjilRabbitModel = $adFactoryCrawlersBarjilRabbitModel;
        $this->adFactoryCrawlersBarjilRabbitChannel = $adFactoryCrawlersBarjilRabbitModel->getChannel();

        $this->adFactoryCrawlersShopsabzRabbitModel = $adFactoryCrawlersShopsabzRabbitModel;
        $this->adFactoryCrawlersShopsabzRabbitChannel = $adFactoryCrawlersShopsabzRabbitModel->getChannel();

        $this->adFactoryCrawlersDigiberoozRabbitModel = $adFactoryCrawlersDigiberoozRabbitModel;
        $this->adFactoryCrawlersDigiberoozRabbitChannel = $adFactoryCrawlersDigiberoozRabbitModel->getChannel();

        $this->adFactoryCrawlersRtlthemeRabbitModel = $adFactoryCrawlersRtlthemeRabbitModel;
        $this->adFactoryCrawlersRtlthemeRabbitChannel = $adFactoryCrawlersRtlthemeRabbitModel->getChannel();

        $this->adFactoryCrawlersBasalamRabbitModel = $adFactoryCrawlersBasalamRabbitModel;
        $this->adFactoryCrawlersBasalamRabbitChannel = $adFactoryCrawlersBasalamRabbitModel->getChannel();

        $this->adFactoryCrawlersNoornegarRabbitModel = $adFactoryCrawlersNoornegarRabbitModel;
        $this->adFactoryCrawlersNoornegarRabbitChannel = $adFactoryCrawlersNoornegarRabbitModel->getChannel();

        $this->adFactoryCrawlersWinmarketRabbitModel = $adFactoryCrawlersWinmarketRabbitModel;
        $this->adFactoryCrawlersWinmarketRabbitChannel = $adFactoryCrawlersWinmarketRabbitModel->getChannel();

        $this->adFactoryCrawlersShahrsaatRabbitModel = $adFactoryCrawlersShahrsaatRabbitModel;
        $this->adFactoryCrawlersShahrsaatRabbitChannel = $adFactoryCrawlersShahrsaatRabbitModel->getChannel();

        $this->adFactoryCrawlersFafaitRabbitModel = $adFactoryCrawlersFafaitRabbitModel;
        $this->adFactoryCrawlersFafaitRabbitChannel = $adFactoryCrawlersFafaitRabbitModel->getChannel();

        $this->adFactoryCrawlersSnappmarketRabbitModel = $adFactoryCrawlersSnappmarketRabbitModel;
        $this->adFactoryCrawlersSnappmarketRabbitChannel = $adFactoryCrawlersSnappmarketRabbitModel->getChannel();

        $this->adFactoryCrawlersGanjipakhshRabbitModel = $adFactoryCrawlersGanjipakhshRabbitModel;
        $this->adFactoryCrawlersGanjipakhshRabbitChannel = $adFactoryCrawlersGanjipakhshRabbitModel->getChannel();

        $this->adFactoryCrawlersShabjomeRabbitModel = $adFactoryCrawlersShabjomeRabbitModel;
        $this->adFactoryCrawlersShabjomeRabbitChannel = $adFactoryCrawlersShabjomeRabbitModel->getChannel();

        $this->adFactoryCrawlersLohegostareshRabbitModel = $adFactoryCrawlersLohegostareshRabbitModel;
        $this->adFactoryCrawlersLohegostareshRabbitChannel = $adFactoryCrawlersLohegostareshRabbitModel->getChannel();

        $this->adFactoryCrawlersDanielleeiranRabbitModel = $adFactoryCrawlersDanielleeiranRabbitModel;
        $this->adFactoryCrawlersDanielleeiranRabbitChannel = $adFactoryCrawlersDanielleeiranRabbitModel->getChannel();

        $this->adFactoryCrawlersYaarmedRabbitModel = $adFactoryCrawlersYaarmedRabbitModel;
        $this->adFactoryCrawlersYaarmedRabbitChannel = $adFactoryCrawlersYaarmedRabbitModel->getChannel();

        $this->adFactoryCrawlersVitrinnetRabbitModel = $adFactoryCrawlersVitrinnetRabbitModel;
        $this->adFactoryCrawlersVitrinnetRabbitChannel = $adFactoryCrawlersVitrinnetRabbitModel->getChannel();

        $this->adFactoryCrawlersJimboshopRabbitModel = $adFactoryCrawlersJimboshopRabbitModel;
        $this->adFactoryCrawlersJimboshopRabbitChannel = $adFactoryCrawlersJimboshopRabbitModel->getChannel();

        $this->adFactoryCrawlersTexnoliRabbitModel = $adFactoryCrawlersTexnoliRabbitModel;
        $this->adFactoryCrawlersTexnoliRabbitChannel = $adFactoryCrawlersTexnoliRabbitModel->getChannel();

        $this->adFactoryCrawlersJavanbakhtgoldRabbitModel = $adFactoryCrawlersJavanbakhtgoldRabbitModel;
        $this->adFactoryCrawlersJavanbakhtgoldRabbitChannel = $adFactoryCrawlersJavanbakhtgoldRabbitModel->getChannel();

        $this->adFactoryCrawlersSabzimanRabbitModel = $adFactoryCrawlersSabzimanRabbitModel;
        $this->adFactoryCrawlersSabzimanRabbitChannel = $adFactoryCrawlersSabzimanRabbitModel->getChannel();

        $this->adFactoryCrawlersDekomajRabbitModel = $adFactoryCrawlersDekomajRabbitModel;
        $this->adFactoryCrawlersDekomajRabbitChannel = $adFactoryCrawlersDekomajRabbitModel->getChannel();

        $this->adFactoryCrawlersBidopinRabbitModel = $adFactoryCrawlersBidopinRabbitModel;
        $this->adFactoryCrawlersBidopinRabbitChannel = $adFactoryCrawlersBidopinRabbitModel->getChannel();

        $this->adFactoryCrawlersMashinnoRabbitModel = $adFactoryCrawlersMashinnoRabbitModel;
        $this->adFactoryCrawlersMashinnoRabbitChannel = $adFactoryCrawlersMashinnoRabbitModel->getChannel();

        $this->adFactoryCrawlersNiluxRabbitModel = $adFactoryCrawlersNiluxRabbitModel;
        $this->adFactoryCrawlersNiluxRabbitChannel = $adFactoryCrawlersNiluxRabbitModel->getChannel();

        $this->adFactoryCrawlersVistorRabbitModel = $adFactoryCrawlersVistorRabbitModel;
        $this->adFactoryCrawlersVistorRabbitChannel = $adFactoryCrawlersVistorRabbitModel->getChannel();

        $this->adFactoryCrawlersLoziRabbitModel = $adFactoryCrawlersLoziRabbitModel;
        $this->adFactoryCrawlersLoziRabbitChannel = $adFactoryCrawlersLoziRabbitModel->getChannel();

        $this->adFactoryCrawlersKharidkala24RabbitModel = $adFactoryCrawlersKharidkala24RabbitModel;
        $this->adFactoryCrawlersKharidkala24RabbitChannel = $adFactoryCrawlersKharidkala24RabbitModel->getChannel();

        $this->adFactoryCrawlersSana3dRabbitModel = $adFactoryCrawlersSana3dRabbitModel;
        $this->adFactoryCrawlersSana3dRabbitChannel = $adFactoryCrawlersSana3dRabbitModel->getChannel();

        $this->adFactoryCrawlersKetablandRabbitModel = $adFactoryCrawlersKetablandRabbitModel;
        $this->adFactoryCrawlersKetablandRabbitChannel = $adFactoryCrawlersKetablandRabbitModel->getChannel();

        $this->adFactoryCrawlersMajeurshawlRabbitModel = $adFactoryCrawlersMajeurshawlRabbitModel;
        $this->adFactoryCrawlersMajeurshawlRabbitChannel = $adFactoryCrawlersMajeurshawlRabbitModel->getChannel();

        $this->adFactoryCrawlersTarisgoldRabbitModel = $adFactoryCrawlersTarisgoldRabbitModel;
        $this->adFactoryCrawlersTarisgoldRabbitChannel = $adFactoryCrawlersTarisgoldRabbitModel->getChannel();

        $this->adFactoryCrawlersTirdadhomeRabbitModel = $adFactoryCrawlersTirdadhomeRabbitModel;
        $this->adFactoryCrawlersTirdadhomeRabbitChannel = $adFactoryCrawlersTirdadhomeRabbitModel->getChannel();

        $this->adFactoryCrawlersKalavarzeshRabbitModel = $adFactoryCrawlersKalavarzeshRabbitModel;
        $this->adFactoryCrawlersKalavarzeshRabbitChannel = $adFactoryCrawlersKalavarzeshRabbitModel->getChannel();

        $this->adFactoryCrawlersParstinaRabbitModel = $adFactoryCrawlersParstinaRabbitModel;
        $this->adFactoryCrawlersParstinaRabbitChannel = $adFactoryCrawlersParstinaRabbitModel->getChannel();

        $this->adFactoryCrawlersKhanoumiRabbitModel = $adFactoryCrawlersKhanoumiRabbitModel;
        $this->adFactoryCrawlersKhanoumiRabbitChannel = $adFactoryCrawlersKhanoumiRabbitModel->getChannel();

        $this->adFactoryCrawlersChapaghaRabbitModel = $adFactoryCrawlersChapaghaRabbitModel;
        $this->adFactoryCrawlersChapaghaRabbitChannel = $adFactoryCrawlersChapaghaRabbitModel->getChannel();

        $this->adFactoryCrawlersSetmenRabbitModel = $adFactoryCrawlersSetmenRabbitModel;
        $this->adFactoryCrawlersSetmenRabbitChannel = $adFactoryCrawlersSetmenRabbitModel->getChannel();

        $this->adFactoryCrawlersWatchonlineRabbitModel = $adFactoryCrawlersWatchonlineRabbitModel;
        $this->adFactoryCrawlersWatchonlineRabbitChannel = $adFactoryCrawlersWatchonlineRabbitModel->getChannel();

        $this->adFactoryCrawlersIransporterRabbitModel = $adFactoryCrawlersIransporterRabbitModel;
        $this->adFactoryCrawlersIransporterRabbitChannel = $adFactoryCrawlersIransporterRabbitModel->getChannel();

        $this->adFactoryCrawlersCartonsabzRabbitModel = $adFactoryCrawlersCartonsabzRabbitModel;
        $this->adFactoryCrawlersCartonsabzRabbitChannel = $adFactoryCrawlersCartonsabzRabbitModel->getChannel();

        $this->adFactoryCrawlersManilooRabbitModel = $adFactoryCrawlersManilooRabbitModel;
        $this->adFactoryCrawlersManilooRabbitChannel = $adFactoryCrawlersManilooRabbitModel->getChannel();

        $this->adFactoryCrawlersKhaneyenoRabbitModel = $adFactoryCrawlersKhaneyenoRabbitModel;
        $this->adFactoryCrawlersKhaneyenoRabbitChannel = $adFactoryCrawlersKhaneyenoRabbitModel->getChannel();

        $this->adFactoryCrawlersKalatikRabbitModel = $adFactoryCrawlersKalatikRabbitModel;
        $this->adFactoryCrawlersKalatikRabbitChannel = $adFactoryCrawlersKalatikRabbitModel->getChannel();

        $this->adFactoryCrawlersAtrumeRabbitModel = $adFactoryCrawlersAtrumeRabbitModel;
        $this->adFactoryCrawlersAtrumeRabbitChannel = $adFactoryCrawlersAtrumeRabbitModel->getChannel();

        $this->adFactoryCrawlersPasariaRabbitModel = $adFactoryCrawlersPasariaRabbitModel;
        $this->adFactoryCrawlersPasariaRabbitChannel = $adFactoryCrawlersPasariaRabbitModel->getChannel();

        $this->adFactoryCrawlersAfrangdigitalRabbitModel = $adFactoryCrawlersAfrangdigitalRabbitModel;
        $this->adFactoryCrawlersAfrangdigitalRabbitChannel = $adFactoryCrawlersAfrangdigitalRabbitModel->getChannel();

        $this->adFactoryCrawlersLipakRabbitModel = $adFactoryCrawlersLipakRabbitModel;
        $this->adFactoryCrawlersLipakRabbitChannel = $adFactoryCrawlersLipakRabbitModel->getChannel();

        $this->adFactoryCrawlersPelazioRabbitModel = $adFactoryCrawlersPelazioRabbitModel;
        $this->adFactoryCrawlersPelazioRabbitChannel = $adFactoryCrawlersPelazioRabbitModel->getChannel();

        $this->adFactoryCrawlersBishtarazyekRabbitModel = $adFactoryCrawlersBishtarazyekRabbitModel;
        $this->adFactoryCrawlersBishtarazyekRabbitChannel = $adFactoryCrawlersBishtarazyekRabbitModel->getChannel();

        $this->adFactoryCrawlersDaneshlandRabbitModel = $adFactoryCrawlersDaneshlandRabbitModel;
        $this->adFactoryCrawlersDaneshlandRabbitChannel = $adFactoryCrawlersDaneshlandRabbitModel->getChannel();

        $this->adFactoryCrawlersDobisellRabbitModel = $adFactoryCrawlersDobisellRabbitModel;
        $this->adFactoryCrawlersDobisellRabbitChannel = $adFactoryCrawlersDobisellRabbitModel->getChannel();

        $this->adFactoryCrawlersZoobitechRabbitModel = $adFactoryCrawlersZoobitechRabbitModel;
        $this->adFactoryCrawlersZoobitechRabbitChannel = $adFactoryCrawlersZoobitechRabbitModel->getChannel();

        $this->adFactoryCrawlersBornaShoRabbitModel = $adFactoryCrawlersBornaShoRabbitModel;
        $this->adFactoryCrawlersBornaShoRabbitChannel = $adFactoryCrawlersBornaShoRabbitModel->getChannel();

        $this->adFactoryCrawlersAghayesangiRabbitModel = $adFactoryCrawlersAghayesangiRabbitModel;
        $this->adFactoryCrawlersAghayesangiRabbitChannel = $adFactoryCrawlersAghayesangiRabbitModel->getChannel();

        $this->adFactoryCrawlersRoshapharmacyRabbitModel = $adFactoryCrawlersRoshapharmacyRabbitModel;
        $this->adFactoryCrawlersRoshapharmacyRabbitChannel = $adFactoryCrawlersRoshapharmacyRabbitModel->getChannel();

        $this->adFactoryCrawlersNamayandeyabRabbitModel = $adFactoryCrawlersNamayandeyabRabbitModel;
        $this->adFactoryCrawlersNamayandeyabRabbitChannel = $adFactoryCrawlersNamayandeyabRabbitModel->getChannel();

        $this->adFactoryCrawlersDeydigitalRabbitModel = $adFactoryCrawlersDeydigitalRabbitModel;
        $this->adFactoryCrawlersDeydigitalRabbitChannel = $adFactoryCrawlersDeydigitalRabbitModel->getChannel();

        $this->adFactoryCrawlersVenkaRabbitModel = $adFactoryCrawlersVenkaRabbitModel;
        $this->adFactoryCrawlersVenkaRabbitChannel = $adFactoryCrawlersVenkaRabbitModel->getChannel();

        $this->adFactoryCrawlersBehinminerRabbitModel = $adFactoryCrawlersBehinminerRabbitModel;
        $this->adFactoryCrawlersBehinminerRabbitChannel = $adFactoryCrawlersBehinminerRabbitModel->getChannel();

        $this->adFactoryCrawlersIdebookRabbitModel = $adFactoryCrawlersIdebookRabbitModel;
        $this->adFactoryCrawlersIdebookRabbitChannel = $adFactoryCrawlersIdebookRabbitModel->getChannel();

        $this->adFactoryCrawlersAsroonRabbitModel = $adFactoryCrawlersAsroonRabbitModel;
        $this->adFactoryCrawlersAsroonRabbitChannel = $adFactoryCrawlersAsroonRabbitModel->getChannel();

        $this->adFactoryCrawlersHomsaRabbitModel = $adFactoryCrawlersHomsaRabbitModel;
        $this->adFactoryCrawlersHomsaRabbitChannel = $adFactoryCrawlersHomsaRabbitModel->getChannel();

        $this->adFactoryCrawlersMahfamshopRabbitModel = $adFactoryCrawlersMahfamshopRabbitModel;
        $this->adFactoryCrawlersMahfamshopRabbitChannel = $adFactoryCrawlersMahfamshopRabbitModel->getChannel();

        $this->adFactoryCrawlersShahreketabonlineRabbitModel = $adFactoryCrawlersShahreketabonlineRabbitModel;
        $this->adFactoryCrawlersShahreketabonlineRabbitChannel = $adFactoryCrawlersShahreketabonlineRabbitModel->getChannel();
        
        $this->adFactoryCrawlersRubikRabbitModel = $adFactoryCrawlersRubikRabbitModel;
        $this->adFactoryCrawlersRubikRabbitChannel = $adFactoryCrawlersRubikRabbitModel->getChannel();
        
        $this->adFactoryCrawlersMoeinsoftRabbitModel = $adFactoryCrawlersMoeinsoftRabbitModel;
        $this->adFactoryCrawlersMoeinsoftRabbitChannel = $adFactoryCrawlersMoeinsoftRabbitModel->getChannel();
        //last_set
        //ATTENTION : please do not remove above comment this is a flag for crawler generator

        $this->companyLogger = $companyLogger;
    }

    /**
     * @param $uSleep
     */
    public function main($uSleep): void
    {
        $this->init($uSleep);
        $this->run();
    }

    /**
     * @param $uSleep
     */
    public function init($uSleep): void
    {
        $this->uSleep = $uSleep;
        $this->channel = $this->adFactoryUserPagesRabbitModel->getChannel();
    }

    /**
     *
     */
    private function run()
    {
        while (true) {
            $msg = $this->pop();
            if ($msg != null) {
                try {
                    $this->handleMessages($msg);
                    usleep($this->uSleep);
                } catch (DummyException $de) {
                    //
                } catch (Exception $e) {
                    Sentry::send($e);
                    $this->companyLogger->log(
                        LogLevel::EMERGENCY,
                        'unhandled exception in create mini ad handler',
                        ['message' => json_decode($msg->body, true), 'exception_message' => $e->getMessage(), 'exception_trace' => $e->getTraceAsString()]
                    );
                }
            } else {
                usleep($this->uSleep * 100);
            }
        }
    }

    /**
     * @return mixed
     */
    private function pop()
    {
        return $this->adFactoryUserPagesRabbitModel->basicGet($this->channel);
    }

    /**
     * @param $msg
     * @throws DummyException
     */
    private function handleMessages($msg)
    {
        //TODO need lots of refactors specially separating things as functions

        $this->startTime = Time::now();
        $msg = json_decode($msg->body, true);
        $this->validateReferer($msg);
        //TODO later what should we do with user_agent and is_mobile and other data which is sent from dmp [handle is_mobile is not present when it's false]

        $mediaId = $msg[RegisterMessageConstant::MEDIA_ID];
        $media = $this->getMedia($mediaId);
        $this->checkMediaExist($msg, $media, $this->companyLogger);

        //TODO add other type of crawling based on media config [just_schema, js, hybrid, api?, ...]

        $crawlerType = MediaConstant::CRAWLER_TYPE_SCHEMA;
        if (isset($media->crawler->type)) {
            $crawlerType = $media->crawler->type;
        }

        if ($crawlerType == MediaConstant::CRAWLER_TYPE_SCHEMA) {
            $this->adFactoryCrawlersSchemaRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersSchemaRabbitChannel);
            $this->companyLogger->log(
                LogLevel::INFO,
                'user pages message passed to schema crawler for ' . $media->domain,
                ['duration' => Time::duration($this->startTime)]
            );
        } else {
            $crawlerDomain = $media->crawler->domain ?? null;
            switch ($crawlerDomain) {
                case MediaConstant::CRAWLER_DOMAIN_BANIMODE:
                    $this->adFactoryCrawlersBanimodeRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersBanimodeRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_BONAKCHI:
                    $this->adFactoryCrawlersBonakchiRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersBonakchiRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_ESAM:
                    $this->adFactoryCrawlersEsamRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersEsamRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_BODY_SPINNER:
                    $this->adFactoryCrawlersBodySpinnerRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersBodySpinnerRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_ZHIYAR:
                    $this->adFactoryCrawlersZhiyarRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersZhiyarRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_ZHAKET:
                    $this->adFactoryCrawlersZhaketRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersZhaketRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_MELLISHOES:
                    $this->adFactoryCrawlersMelliShoesRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersMelliShoesRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_ESEMINAR:
                    $this->adFactoryCrawlersEseminarRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersEseminarRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_IRANMRCARPET:
                    $this->adFactoryCrawlersIranmrcarpetRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersIranmrcarpetRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_MARTO:
                    $this->adFactoryCrawlersMartoRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersMartoRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_JEANIRANSHOP:
                    $this->adFactoryCrawlersJeaniranshopRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersJeaniranshopRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_VITRINEZIBA:
                    $this->adFactoryCrawlersVitrinezibaRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersVitrinezibaRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_BATTERIES:
                    $this->adFactoryCrawlersBatteriesRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersBatteriesRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_BORNOSMODE:
                    $this->adFactoryCrawlersBornosmodeRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersBornosmodeRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_BARJIL:
                    $this->adFactoryCrawlersBarjilRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersBarjilRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_SHOPSABZ:
                    $this->adFactoryCrawlersShopsabzRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersShopsabzRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_DIGIBEROOZ:
                    $this->adFactoryCrawlersDigiberoozRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersDigiberoozRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_RTLTHEME:
                    $this->adFactoryCrawlersRtlthemeRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersRtlthemeRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_BASALAM:
                    $this->adFactoryCrawlersBasalamRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersBasalamRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_NOORNEGAR:
                    $this->adFactoryCrawlersNoornegarRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersNoornegarRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_WINMARKET:
                    $this->adFactoryCrawlersWinmarketRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersWinmarketRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_SHAHRSAAT:
                    $this->adFactoryCrawlersShahrsaatRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersShahrsaatRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_FAFAIT:
                    $this->adFactoryCrawlersFafaitRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersFafaitRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_SNAPPMARKET:
                    $this->adFactoryCrawlersSnappmarketRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersSnappmarketRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_GANJIPAKHSH:
                    $this->adFactoryCrawlersGanjipakhshRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersGanjipakhshRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_SHABJOME:
                    $this->adFactoryCrawlersShabjomeRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersShabjomeRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_LOHEGOSTARESH:
                    $this->adFactoryCrawlersLohegostareshRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersLohegostareshRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_DANIELLEEIRAN:
                    $this->adFactoryCrawlersDanielleeiranRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersDanielleeiranRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_YAARMED:
                    $this->adFactoryCrawlersYaarmedRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersYaarmedRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_VITRINNET:
                    $this->adFactoryCrawlersVitrinnetRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersVitrinnetRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_JIMBOSHOP:
                    $this->adFactoryCrawlersJimboshopRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersJimboshopRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_TEXNOLI:
                    $this->adFactoryCrawlersTexnoliRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersTexnoliRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_JAVANBAKHTGOLD:
                    $this->adFactoryCrawlersJavanbakhtgoldRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersJavanbakhtgoldRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_SABZIMAN:
                    $this->adFactoryCrawlersSabzimanRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersSabzimanRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_DEKOMAJ:
                    $this->adFactoryCrawlersDekomajRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersDekomajRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_BIDOPIN:
                    $this->adFactoryCrawlersBidopinRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersBidopinRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_MASHINNO:
                    $this->adFactoryCrawlersMashinnoRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersMashinnoRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_NILUX:
                    $this->adFactoryCrawlersNiluxRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersNiluxRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_VISTOR:
                    $this->adFactoryCrawlersVistorRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersVistorRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_LOZI:
                    $this->adFactoryCrawlersLoziRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersLoziRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_KHARIDKALA24:
                    $this->adFactoryCrawlersKharidkala24RabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersKharidkala24RabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_SANA3D:
                    $this->adFactoryCrawlersSana3dRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersSana3dRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_KETABLAND:
                    $this->adFactoryCrawlersKetablandRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersKetablandRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_MAJEURSHAWL:
                    $this->adFactoryCrawlersMajeurshawlRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersMajeurshawlRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_TARISGOLD:
                    $this->adFactoryCrawlersTarisgoldRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersTarisgoldRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_TIRDADHOME:
                    $this->adFactoryCrawlersTirdadhomeRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersTirdadhomeRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_KALAVARZESH:
                    $this->adFactoryCrawlersKalavarzeshRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersKalavarzeshRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_PARSTINA:
                    $this->adFactoryCrawlersParstinaRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersParstinaRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_KHANOUMI:
                    $this->adFactoryCrawlersKhanoumiRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersKhanoumiRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_CHAPAGHA:
                    $this->adFactoryCrawlersChapaghaRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersChapaghaRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_SETMEN:
                    $this->adFactoryCrawlersSetmenRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersSetmenRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_WATCHONLINE:
                    $this->adFactoryCrawlersWatchonlineRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersWatchonlineRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_IRANSPORTER:
                    $this->adFactoryCrawlersIransporterRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersIransporterRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_CARTONSABZ:
                    $this->adFactoryCrawlersCartonsabzRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersCartonsabzRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_MANILOO:
                    $this->adFactoryCrawlersManilooRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersManilooRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_KHANEYENO:
                    $this->adFactoryCrawlersKhaneyenoRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersKhaneyenoRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_KALATIK:
                    $this->adFactoryCrawlersKalatikRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersKalatikRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_ATRUME:
                    $this->adFactoryCrawlersAtrumeRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersAtrumeRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_PASARIA:
                    $this->adFactoryCrawlersPasariaRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersPasariaRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_AFRANGDIGITAL:
                    $this->adFactoryCrawlersAfrangdigitalRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersAfrangdigitalRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_LIPAK:
                    $this->adFactoryCrawlersLipakRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersLipakRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_PELAZIO:
                    $this->adFactoryCrawlersPelazioRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersPelazioRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_BISHTARAZYEK:
                    $this->adFactoryCrawlersBishtarazyekRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersBishtarazyekRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_DANESHLAND:
                    $this->adFactoryCrawlersDaneshlandRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersDaneshlandRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_DOBISELL:
                    $this->adFactoryCrawlersDobisellRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersDobisellRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_ZOOBITECH:
                    $this->adFactoryCrawlersZoobitechRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersZoobitechRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_ROSHAPHARMACY:
                    $this->adFactoryCrawlersRoshapharmacyRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersRoshapharmacyRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_BORNASHO:
                    $this->adFactoryCrawlersBornaShoRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersBornaShoRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_AGHAYESANGI:
                    $this->adFactoryCrawlersAghayesangiRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersAghayesangiRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_NAMAYANDEYAB:
                    $this->adFactoryCrawlersNamayandeyabRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersNamayandeyabRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_DEYDIGITAL:
                    $this->adFactoryCrawlersDeydigitalRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersDeydigitalRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_VENKA:
                    $this->adFactoryCrawlersVenkaRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersVenkaRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_BEHINMINER:
                    $this->adFactoryCrawlersBehinminerRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersBehinminerRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_IDEBOOK:
                    $this->adFactoryCrawlersIdebookRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersIdebookRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_ASROON:
                    $this->adFactoryCrawlersAsroonRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersAsroonRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_HOMSA:
                    $this->adFactoryCrawlersHomsaRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersHomsaRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_MAHFAMSHOP:
                    $this->adFactoryCrawlersMahfamshopRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersMahfamshopRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_SHAHREKETABONLINE:
                    $this->adFactoryCrawlersShahreketabonlineRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersShahreketabonlineRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_RUBIK:
                    $this->adFactoryCrawlersRubikRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersRubikRabbitChannel);
                    break;
                case MediaConstant::CRAWLER_DOMAIN_MOEINSOFT:
                    $this->adFactoryCrawlersMoeinsoftRabbitModel->basicPublish($msg, false, $this->adFactoryCrawlersMoeinsoftRabbitChannel);
                    break;
                //last_case
                //ATTENTION : please do not remove above comment this is a flag for crawler generator
                default:
                    $this->companyLogger->log(
                        LogLevel::ERROR,
                        'media crawler domain is not defined',
                        ['media_id' => $mediaId, 'message' => $msg]
                    );
                    throw new DummyException();
            }

            $this->companyLogger->log(
                LogLevel::INFO,
                'user pages message passed to ' . $media->domain . ' crawler',
                ['duration' => Time::duration($this->startTime)]
            );
        }
    }

    /**
     * @param $msg
     * @throws DummyException
     */
    private function validateReferer($msg)
    {
        // Referer does not exist
        if (!isset($msg[RegisterMessageConstant::REFERER])) {
            $this->companyLogger->log(
                LogLevel::ERROR,
                'Referer dose not exists.',
                ['message' => $msg, 'duration' => Time::duration($this->startTime)]
            );

            throw new DummyException();
        }

        // Referer validation
        $url = $msg[RegisterMessageConstant::REFERER];
        $urlComponents = parse_url($url);
        $allowedProtocol = ['https', 'http'];
        if (!isset($urlComponents['scheme']) || !in_array($urlComponents['scheme'], $allowedProtocol)) {
            $this->companyLogger->log(
                LogLevel::ERROR,
                'Referer is not a valid url.',
                ['message' => $msg, 'duration' => Time::duration($this->startTime)]
            );

            throw new DummyException();
        }

    }
}
