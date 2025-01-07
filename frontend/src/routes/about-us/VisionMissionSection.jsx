import { css } from '@emotion/react';
import { Col, Container, Row } from 'react-bootstrap';
import OnHoverAnimationCss from '../OnHoverAnimationCss';

export default function VisionMissionSection() {
  return (
    <Container fluid style={{ background: 'red' }}>
      <Container
        css={css`
          color: white;
          text-align: center;
          @media (min-width: 992px) {
            width: 720px;
          }
        `}
      >
        <br />
        <h2 data-aos='fade-right' data-aos-duration='1200' data-aos-once='true'>
          <b>Our Vision and Mission.</b>
        </h2>
        <p
          data-aos='fade-left'
          data-aos-duration='1200'
          data-aos-once='true'
          style={{ fontSize: '20px' }}
        >
          We have formulized our vision and mission in the hopes that CIMSA UGM
          can better address the problems in our area
        </p>
        <br />
        <div data-aos='zoom-in' data-aos-duration='1200' data-aos-once='true'>
          <Container
            fluid
            css={css`
              background: white;
              color: black;
              box-shadow: 1px 1px 8px 4px rgba(0, 0, 0, 0.4);
              border-radius: 20px;
              padding: 15px;

              ${OnHoverAnimationCss(1.03)}
            `}
          >
            <h2 style={{ color: 'red' }}>
              <b>VISION</b>
            </h2>
            <p style={{ fontSize: '18px' }}>
              CIMSA UGM sebagai organisasi mahasiswa kedokteran yang adaptif,
              dinamis, dan bergairah dalam melaksanakan program kerja
              berkelanjutan serta mewujudkan lingkungan yang profesional dan
              harmonis bagi para member dan officials.{' '}
            </p>
          </Container>
        </div>
        <hr />
        <div data-aos='zoom-in' data-aos-duration='1200' data-aos-once='true'>
          <Container
            fluid
            css={css`
              background: white;
              color: black;

              box-shadow: 1px 1px 8px 4px rgba(0, 0, 0, 0.4);
              border-radius: 20px;
              padding: 15px;

              ${OnHoverAnimationCss(1.03)}
            `}
          >
            <h2 style={{ color: 'red' }}>
              <b>MISSION</b>
            </h2>
            <br />
            <Row xs={1} sm={1} md={2} className='justify-content-center g-3'>
              <Col>
                <h4>
                  <b>Title 1</b>
                </h4>
                <p style={{ fontSize: '18px' }}>
                  Description 1 goes here. It should be a concise and meaningful
                  statement that reflects the essence of the first mission.
                </p>
              </Col>
              <Col>
                <h4>
                  <b>Title 2</b>
                </h4>
                <p style={{ fontSize: '18px' }}>
                  Description 2 goes here. It should be a concise and meaningful
                  statement that reflects the essence of the second mission.
                </p>
              </Col>
              <Col>
                <h4>
                  <b>Title 3</b>
                </h4>
                <p style={{ fontSize: '18px' }}>
                  Description 3 goes here. It should be a concise and meaningful
                  statement that reflects the essence of the third mission.
                </p>
              </Col>
              <Col>
                <h4>
                  <b>Title 4</b>
                </h4>
                <p style={{ fontSize: '18px' }}>
                  Description 4 goes here. It should be a concise and meaningful
                  statement that reflects the essence of the fourth mission.
                </p>
              </Col>
              <Col>
                <h4>
                  <b>Title 5</b>
                </h4>
                <p style={{ fontSize: '18px' }}>
                  Description 5 goes here. It should be a concise and meaningful
                  statement that reflects the essence of the fifth mission.
                </p>
              </Col>
            </Row>
          </Container>
        </div>
        <br />
        <br />
      </Container>
    </Container>
  );
}
