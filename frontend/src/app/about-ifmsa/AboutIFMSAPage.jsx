import { css, Global } from '@emotion/react';
import PageHeader from '../../components/PageHeader';
import { Col, Container, Image, Row } from 'react-bootstrap';
import PrimaryButton from '../../components/PrimaryButton';
import { fetchJSON, getOnHoverAnimationCss, setPageMeta } from '../../utils';
import { endpoint } from '../../configs';
import LoadingPage from '../../components/LoadingPage';
import HtmlParser from '../../components/HtmlParser';
import useSWR from 'swr';
import { PageMeta } from '../../components/PageMeta';
import IFMSALogo from '../../assets/ifmsa-logo.jpg';

export default function AboutIFMSAPage() {
  const page = useSWR(`${endpoint}/api/page/about-ifmsa`, fetchJSON);

  if (page.isLoading) return <LoadingPage />;
  if (page.error) return <LoadFailedPage />;

  return (
    <>
      <PageMeta
        title='About IFMSA - CIMSA ULM'
        description='International Federation of Medical Students’ Association (IFMSA) adalah organisasi non-profit, non-pemerintah dan non-partisipan yang mewakili asosiasi mahasiswa kedokteran internasional.'
        ogImage={IFMSALogo}
      />
      <main>
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
          description={
            <HtmlParser
              html={
                page.data.contents.find((x) => x.column === 'description')
                  .long_text_content
              }
            />
          }
          titleColor='#1f3868'
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

                ${getOnHoverAnimationCss(1.02)}
              `}
            >
              <Col>
                <center>
                  <Image
                    fluid
                    alt='IFMSA'
                    src={
                      page.data.contents.find((x) => x.column === 'ifmsa-image')
                        .galleries[0].url
                    }
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
                  <HtmlParser
                    html={
                      page.data.contents.find(
                        (x) => x.column === 'ifmsa-description'
                      ).long_text_content
                    }
                  />
                </p>
                <PrimaryButton
                  to={
                    page.data.contents.find((x) => x.column === 'ifmsa-url')
                      .text_content
                  }
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
      </main>
    </>
  );
}
