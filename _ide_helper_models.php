<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int $siswa_id
 * @property int $guru_id
 * @property int $minggu_ke
 * @property int $bulan
 * @property int $tahun
 * @property string|null $nilai_agama_moral
 * @property string|null $catatan_agama_moral
 * @property string|null $motorik_kasar
 * @property string|null $catatan_motorik_kasar
 * @property string|null $motorik_halus
 * @property string|null $catatan_motorik_halus
 * @property string|null $kognitif
 * @property string|null $catatan_kognitif
 * @property string|null $bahasa
 * @property string|null $catatan_bahasa
 * @property string|null $sosial_emosional
 * @property string|null $catatan_sosial_emosional
 * @property string|null $seni
 * @property string|null $catatan_seni
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $guru
 * @property-read \App\Models\Siswa $siswa
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereBahasa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereBulan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereCatatanAgamaMoral($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereCatatanBahasa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereCatatanKognitif($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereCatatanMotorikHalus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereCatatanMotorikKasar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereCatatanSeni($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereCatatanSosialEmosional($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereKognitif($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereMingguKe($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereMotorikHalus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereMotorikKasar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereNilaiAgamaMoral($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereSeni($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereSosialEmosional($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CatatanMingguan whereUpdatedAt($value)
 */
	class CatatanMingguan extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $judul
 * @property string|null $deskripsi
 * @property string $foto
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Galeri newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Galeri newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Galeri query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Galeri whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Galeri whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Galeri whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Galeri whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Galeri whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Galeri whereUpdatedAt($value)
 */
	class Galeri extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $aspek
 * @property string $nilai
 * @property string $teks
 * @property int $urutan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IndikatorPenilaian newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IndikatorPenilaian newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IndikatorPenilaian query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IndikatorPenilaian whereAspek($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IndikatorPenilaian whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IndikatorPenilaian whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IndikatorPenilaian whereNilai($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IndikatorPenilaian whereTeks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IndikatorPenilaian whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IndikatorPenilaian whereUrutan($value)
 */
	class IndikatorPenilaian extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nama_kelas
 * @property string $tahun_ajaran
 * @property int|null $guru_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $guru
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Siswa> $siswas
 * @property-read int|null $siswas_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kelas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kelas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kelas query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kelas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kelas whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kelas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kelas whereNamaKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kelas whereTahunAjaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kelas whereUpdatedAt($value)
 */
	class Kelas extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $siswa_id
 * @property int $bulan
 * @property int $tahun
 * @property string|null $rekap_agama_moral
 * @property string|null $rekap_motorik_kasar
 * @property string|null $rekap_motorik_halus
 * @property string|null $rekap_kognitif
 * @property string|null $rekap_bahasa
 * @property string|null $rekap_sosial_emosional
 * @property string|null $rekap_seni
 * @property string $status
 * @property int|null $disunting_oleh
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $editor
 * @property-read \App\Models\Siswa $siswa
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaporanBulanan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaporanBulanan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaporanBulanan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaporanBulanan whereBulan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaporanBulanan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaporanBulanan whereDisuntingOleh($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaporanBulanan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaporanBulanan whereRekapAgamaMoral($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaporanBulanan whereRekapBahasa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaporanBulanan whereRekapKognitif($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaporanBulanan whereRekapMotorikHalus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaporanBulanan whereRekapMotorikKasar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaporanBulanan whereRekapSeni($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaporanBulanan whereRekapSosialEmosional($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaporanBulanan whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaporanBulanan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaporanBulanan whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LaporanBulanan whereUpdatedAt($value)
 */
	class LaporanBulanan extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $judul
 * @property string $pesan
 * @property string|null $link
 * @property int $is_read
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notifikasi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notifikasi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notifikasi query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notifikasi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notifikasi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notifikasi whereIsRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notifikasi whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notifikasi whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notifikasi wherePesan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notifikasi whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notifikasi whereUserId($value)
 */
	class Notifikasi extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $sambutan_judul
 * @property string $sambutan_nama
 * @property string $sambutan_jabatan
 * @property string|null $sambutan_teks
 * @property string|null $sambutan_foto
 * @property string|null $ttd_kepsek
 * @property string|null $foto_login
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $hero_slide_1
 * @property string|null $hero_slide_2
 * @property string|null $hero_slide_3
 * @property string|null $hero_slide_4
 * @property string|null $hero_slide_5
 * @property string|null $maps_embed
 * @property string|null $alamat_lengkap
 * @property string|null $no_telepon
 * @property string|null $email_sekolah
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereAlamatLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereEmailSekolah($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereFotoLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereHeroSlide1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereHeroSlide2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereHeroSlide3($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereHeroSlide4($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereHeroSlide5($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereMapsEmbed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereNoTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereSambutanFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereSambutanJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereSambutanJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereSambutanNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereSambutanTeks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereTtdKepsek($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfilSekolah whereUpdatedAt($value)
 */
	class ProfilSekolah extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nis
 * @property string $nama
 * @property \Illuminate\Support\Carbon $tanggal_lahir
 * @property int|null $kelas_id
 * @property string|null $kontak_ortu
 * @property string|null $foto
 * @property bool $is_aktif
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CatatanMingguan> $catatanMingguans
 * @property-read int|null $catatan_mingguans_count
 * @property-read \App\Models\Kelas|null $kelas
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LaporanBulanan> $laporanBulanans
 * @property-read int|null $laporan_bulanans_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $orangTuas
 * @property-read int|null $orang_tuas_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereIsAktif($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereKontakOrtu($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereNis($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereUpdatedAt($value)
 */
	class Siswa extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $pin
 * @property string $role
 * @property string|null $ttd
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kelas> $kelas
 * @property-read int|null $kelas_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Siswa> $siswas
 * @property-read int|null $siswas_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTtd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

