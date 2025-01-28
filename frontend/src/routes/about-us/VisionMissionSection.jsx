import { css } from '@emotion/react';
import { Col, Container, Row } from 'react-bootstrap';
import OnHoverAnimationCss from '../OnHoverAnimationCss';
import HtmlParser from '../HtmlParser';

export default function VisionMissionSection({
  description,
  vision,
  missions,
}) {
  console.log(missions);
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
          {description}
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
            <p style={{ fontSize: '18px' }}>{vision}</p>
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
              <b>MISSIONs</b>
            </h2>
            <br />
            <Row xs={1} sm={1} md={2} className='justify-content-center g-3'>
              {missions.map((mission, i) => (
                <Col key={i}>
                  <h4>
                    <b>{mission.title}</b>
                  </h4>
                  <p style={{ fontSize: '18px' }}>
                    <HtmlParser html={mission.description} />
                  </p>
                </Col>
              ))}
            </Row>
          </Container>
        </div>
        <br />
        <br />
      </Container>
    </Container>
  );
}
