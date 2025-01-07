import { Col, Container, Image, Row } from 'react-bootstrap';
import OnHoverAnimationCss from '../OnHoverAnimationCss';
import { css } from '@emotion/react';

export default function SDGsSection() {
  const sdgs = [
    'https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/elementor/thumbs/sdg3-pdloulk821eqai4m2atlml1vt2kd2xyjmf3vrwkjlw.png',
    'https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/elementor/thumbs/sdg-4-pdjpwijpo9276o2s4a7wh3k75nbhqqf9svn34vjaro.png',
    'https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/elementor/thumbs/sdg5-pdlous53dvnqjrv1zvnzm1e3yrnxktonzboa4uasec.png',
    'https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/elementor/thumbs/sdg13-pdloupbktdjvkxz5gcg3wk3q6m1txqdgyxptp0eyx0.png',
  ];

  return (
    <Container fluid style={{ background: 'red' }}>
      <Container
        css={css`
          color: white;
          text-align: center;
          @media (min-width: 768px) {
            width: 540px;
          }
        `}
      >
        <br />
        <h2>
          <b>We advance the Sustainable Development Goals.</b>
        </h2>
        <p style={{ fontSize: '20px' }}>
          We believe in the Sustainable Development Goals (SDGs) and are
          especially aiding the completion of SDG 3 (Good Health), 4 (Quality
          Education), 5 (Gender Equality), and 13 (Climate Action).
        </p>
        <br />
        <h3>SDGS WE SUPPORT:</h3>
        <br />
        <Row xs={2} className='g-4'>
          {sdgs.map((sdg, i) => (
            <Col key={i + 1}>
              <Image
                src={sdg}
                alt={`SDG-${i + 1}`}
                fluid
                css={css`
                  width: 100%;
                  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                  border-radius: 10px;
                  object-fit: cover;
                  border: 2px solid white;

                  ${OnHoverAnimationCss(1.07)}
                `}
              />
            </Col>
          ))}
        </Row>
        <br />
        <br />
      </Container>
    </Container>
  );
}
