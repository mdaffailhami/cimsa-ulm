import { css, Global } from '@emotion/react';
import PageHeader from '../../PageHeader';
import { Col, Container, Image, Row } from 'react-bootstrap';
import PrimaryButton from '../../PrimaryButton';
import OnHoverAnimationCss from '../../OnHoverAnimationCss';

export default function AboutIFMSAPage() {
  return (
    <>
      <Global
        styles={css`
          ::selection {
            color: white;
            background-color: #1f3868;
          }
        `}
      />
      <PageHeader
        title='About IFMSA'
        description='International Federation of Medical Students’ Association (IFMSA) adalah organisasi non-profit, non-pemerintah dan non-partisipan yang mewakili asosiasi mahasiswa kedokteran internasional. IFMSA didirikan pada tahun 1951 dan merupakan salah satu organisasi pelajar dan organisasi pelajar kedokteran tertua di dunia. IFMSA terbagi menjadi lima region: Asia-Pacific tempat kita berada, America, Eastern-Mediterranean, Africa, dan Europe. Menghubungkan mahasiswa kedokteran dari 141 organisasi di 130 negara di seluruh dunia, IFMSA memiliki tujuan yang terbagi dalam enam area: kesehatan masyarakat, kesehatan reproduksi seksual, pendidikan kedokteran, hak asasi manusia dan perdamaian, pertukaran pelajar profesional, dan pertukaran pelajar penelitian.'
        titleColor='#1f3868'
        myCss={css`
          margin-top: 100px;
          margin-bottom: 50px;
        `}
      />
      <Container fluid style={{ background: '#1f3868', padding: '26.5px 0' }}>
        <Container
          data-aos='zoom-out-up'
          data-aos-duration='1200'
          data-aos-once='true'
          css={css`
            @media (min-width: 992px) {
              width: 720px;
            }
          `}
        >
          <Row
            xs={1}
            className='g-4'
            css={css`
              background: white;
              align-items: center;
              margin: 0;
              padding: 0 0 15.5px 0;
              border-radius: 30px;
              box-shadow: 1px 1px 8px 4px rgba(0, 0, 0, 0.4);

              ${OnHoverAnimationCss(1.02)}
            `}
          >
            <Col>
              <center>
                <Image
                  fluid
                  alt='IFMSA Logo'
                  src='https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2021/09/unnamed-1.jpg'
                  css={css`
                    border-radius: 30px;
                    box-shadow: 1px 1px 8px 4px rgba(0, 0, 0, 0.4);
                    width: 100%;
                  `}
                />
              </center>
            </Col>
            <Col
              css={css`
                display: flex;
                flex-direction: column;
                align-items: center;
                padding-bottom: 8px;
              `}
            >
              <p
                css={css`
                  color: black;
                  text-align: center;
                  padding: 0 12px;

                  @media (min-width: 576px) {
                    padding: 0 24px;
                  }

                  @media (min-width: 768px) {
                    padding: 0 34px;
                  }
                `}
              >
                Setiap tahun, IFMSA menyelenggarakan lebih dari 13.000 program
                pertukaran penelitian dan klinis bagi mahasiswanya untuk
                mengeksplorasi inovasi dalam bidang kedokteran, dan sistem
                kesehatan dalam lingkungan yang berbeda. IFMSA juga secara resmi
                diakui oleh Perserikatan Bangsa-Bangsa sebagai suara mahasiswa
                kedokteran internasional, dan memiliki hubungan resmi dengan
                badan-badan PBB utama, seperti Organisasi Kesehatan Dunia,
                UNESCO, UNAIDS, UNHCR dan UNFPA, serta pendukung utama seperti
                World Medical Association (WMA). Ini memastikan bahwa IFMSA
                dianggap sebagai mitra utama dalam hal masalah kesehatan global,
                internasional dan lokal. Selain itu, federasi ini memiliki
                kemitraan resmi dengan beberapa organisasi dan institusi
                kesehatan dan pembangunan internasional lainnya. Anggota
                organisasi di IFMSA dinamakan National Member Organization (NMO)
                dan Indonesia diwakili oleh satu representatif mahasiswa
                kedokteran Indonesia yaitu NMO CIMSA Indonesia.
              </p>
              <PrimaryButton
                to='https://ifmsa.org'
                target='_blank'
                color='#1f3868'
                isLarge={false}
              >
                &nbsp;&nbsp;
                <i
                  className='fa-solid fa-arrow-right'
                  style={{ marginRight: '6.95px' }}
                />
                &nbsp;&nbsp;&nbsp;&nbsp;
                IFMSA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </PrimaryButton>
            </Col>
          </Row>
        </Container>
      </Container>
      <hr />
    </>
  );
}
