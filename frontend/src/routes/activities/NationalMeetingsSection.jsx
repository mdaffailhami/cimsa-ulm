import { css } from '@emotion/react';
import { Col, Container, Row } from 'react-bootstrap';
import PrimaryButton from '../PrimaryButton';

export default function NationalMeetingsSection({
  nationalMeetingsDesc,
  nationalMeetingsEmbeddedYoutubeUrl,
  becomeDelegatesUrl,
}) {
  return (
    <>
      <Container fluid style={{ background: 'red', color: 'white' }}>
        <Container
          style={{
            padding: '55px 0',
            maxWidth: '1140px',
          }}
        >
          <Row xs={1} lg={2}>
            <Col
              css={css`
                text-align: center;
                @media (min-width: 992px) {
                  text-align: left;
                }
              `}
            >
              <h1
                data-aos='zoom-in-right'
                data-aos-once='true'
                data-aos-duration='1200'
              >
                <b>National Meetings</b>
              </h1>
              <p data-aos='fade' data-aos-once='true' data-aos-duration='1200'>
                {nationalMeetingsDesc}
              </p>
              <p
                data-aos='zoom-out'
                data-aos-once='true'
                data-aos-duration='1200'
                style={{ fontWeight: 'bold' }}
              >
                <i className='fa-solid fa-caret-right' /> &nbsp; Watch our video
              </p>
            </Col>
            <Col>
              <center>
                <iframe
                  data-aos='zoom-in'
                  data-aos-once='true'
                  data-aos-duration='1200'
                  width='100%'
                  //   height='315'
                  css={css`
                    height: 260px;

                    @media (min-width: 768px) {
                      height: 500px;
                    }
                    @media (min-width: 992px) {
                      height: 315px;
                    }
                  `}
                  src={nationalMeetingsEmbeddedYoutubeUrl}
                  title='YouTube video player'
                  frameborder='0'
                  allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share'
                  referrerpolicy='strict-origin-when-cross-origin'
                  allowfullscreen
                />
              </center>
            </Col>
          </Row>
        </Container>
      </Container>
      <Container
        style={{
          color: 'red',
          padding: '66px 0',
          maxWidth: '1140px',
        }}
      >
        <Row xs={1} lg={2}>
          <Col
            css={css`
              text-align: center;
              margin-bottom: 12px;

              @media (min-width: 992px) {
                text-align: left;
                margin-bottom: 0px;
              }
            `}
          >
            <h1
              data-aos='fade-right'
              data-aos-once='true'
              data-aos-duration='1200'
            >
              <b>Interested to experience our national meetings?</b>
            </h1>
          </Col>
          <Col
            css={css`
              display: flex;
              justify-content: center;
              align-items: center;
            `}
          >
            <PrimaryButton to={becomeDelegatesUrl}>
              <b>BECOME OUR DELEGATES</b>
            </PrimaryButton>
          </Col>
        </Row>
      </Container>
    </>
  );
}
