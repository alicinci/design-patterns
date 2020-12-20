<?php

namespace Singleton;

use Exception;

/**
 *
 * Singleton deseninin ata sınıfıdır.
 * Veritabanı gibi bağlantılar bu sınıftan sağlanacak.
 * Singleton desenini kullanmak isteyen alt sınıflar
 * bu sınıfı miras alacak.
 *
 * @author Ali Cinci <alicinci.dev@gmail.com>
 */
class Singleton
{
    /**
     * Singleton nesnesi bu statik alanda depolanacak.
     * Bu sınıf özelliği array türündedir çünkü bu dizi
     * içindeki her öğe, belirli bir Singleton alt sınıfının
     * bir örneği olacaktır.
     *
     * @var array
     */
    private static $instances = [];

    /**
     * Singleton'ın kurucusu public olmamalıdır.
     * Ancak, alt sınıfa izin vermek istiyorsak private olamaz.
     * Alt sınıfların bağlantıları kurucu metotta sağlanacak ve
     * protected tanımlanacak.
     *
     * Singleton constructor.
     */
    protected function __construct() {}

    /**
     * Singleton'ın klonlamasına izin vermiyoruz.
     */
    protected function __clone() {}

    /**
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize a singleton.");
    }

    /**
     * Singleton örneğini alacağımız metod.
     * İlk çalıştığında nesneyi oluşturur ve onu statik
     * alana yerleştirir.
     * Sonraki çalıştırmalarda, statik alanda depolanan istemcinin mevcut nesnesini döndürür.
     *
     * @return mixed|static
     */
    public static function getInstance()
    {
        /**
         * Burada gerçek sınıf adı yerine "statik" anahtar sözcüğünü kullandığımıza dikkat edilmeli.
         * Bu bağlamda, "statik" anahtar sözcük, "geçerli sınıfın adı" anlamına gelir.
         * Bu ayrıntı önemlidir, çünkü metod alt sınıfta çağrıldığında
         * bu alt sınıfın bir örneğinin burada oluşturulmasını istiyoruz.
         */
        $subClass = static::class;

        if (!isset(self::$instances[$subClass])) {
            self::$instances[$subClass] = new static();
        }

        return self::$instances[$subClass];
    }
}
