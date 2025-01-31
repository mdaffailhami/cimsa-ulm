import { css, Global } from '@emotion/react';
import PageHeader from '../../PageHeader';
import { Col, Container, Image, Row } from 'react-bootstrap';
import PrimaryButton from '../../PrimaryButton';
import OnHoverAnimationCss from '../../OnHoverAnimationCss';
import { setPageMeta } from '../../../utils';
import { useEffect, useState } from 'react';
import { endpoint } from '../../../configs';
import LoadingIndicator from '../../LoadingIndicator';
import HtmlParser from '../../HtmlParser';

export default function AboutIFMSAPage() {
  setPageMeta(
    'About IFMSA - CIMSA ULM',
    'International Federation of Medical Students’ Association (IFMSA) adalah organisasi non-profit, non-pemerintah dan non-partisipan yang mewakili asosiasi mahasiswa kedokteran internasional. IFMSA didirikan pada tahun 1951 dan merupakan salah satu organisasi pelajar dan organisasi pelajar kedokteran tertua di dunia.'
  );

  const [pageData, setPageData] = useState(undefined);

  useEffect(() => {
    (async () => {
      try {
        const res = await fetch(`${endpoint}/api/page/about-ifmsa`);
        const data = await res.json();

        if (!data) throw new Error('Error fetching data');

        setPageData(data);
      } catch (error) {
        alert(error);
      }
    })();
  }, []);

  if (!pageData) return <LoadingIndicator />;

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
        description={
          <HtmlParser
            html={
              pageData.contents.find((x) => x.column === 'description')
                .text_content
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

              ${OnHoverAnimationCss(1.02)}
            `}
          >
            <Col>
              <center>
                <Image
                  fluid
                  alt='IFMSA Logo'
                  src={
                    pageData.contents.find((x) => x.column === 'ifmsa-image')
                      .image_content
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
                    pageData.contents.find(
                      (x) => x.column === 'ifmsa-description'
                    ).text_content
                  }
                />
              </p>
              <PrimaryButton
                to={
                  pageData.contents.find((x) => x.column === 'ifmsa-url')
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
    </>
  );
}
