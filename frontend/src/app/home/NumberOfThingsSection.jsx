import { css } from '@emotion/react';
import { Card, Col, Container, Row } from 'react-bootstrap';
import CountUp from 'react-countup';

export default function NumberOfThingsSection({ statistics }) {
  return (
    <Container
      className='d-flex flex-wrap justify-content-center'
      data-aos='zoom-in'
      data-aos-duration='1200'
      data-aos-once='true'
    >
      <Row
        xs={2}
        sm={2}
        md={4}
        lg={4}
        className='g-5 flex justify-content-center'
      >
        {statistics.map((statistic, i) => (
          <Col key={i}>
            <NumberOfThing title={statistic.name} content={statistic.count} />
          </Col>
        ))}
      </Row>
    </Container>
  );
}

function NumberOfThing({ title, content }) {
  return (
    <Card style={{ border: 'none' }}>
      <Card.Body>
        <Card.Title as='h1' className='text-center'>
          <CountUp
            enableScrollSpy={true} // Start the animation on scroll
            scrollSpyOnce={true}
            start={0}
            duration={4}
            separator=''
            decimals={0}
            decimal=','
            suffix=''
            prefix={isNaN(content[0]) ? content[0] : ''}
            end={isNaN(content[0]) ? content.slice(1) : content}
          >
            {({ countUpRef }) => (
              <span
                ref={countUpRef}
                css={css`
                  font-weight: 600;
                  color: #2d2d2d;
                  font-size: 36px;

                  @media (min-width: 992px) {
                    font-size: 50px;
                  }
                `}
              />
            )}
          </CountUp>
        </Card.Title>
        <Card.Subtitle className='text-center'>{title}</Card.Subtitle>
      </Card.Body>
    </Card>
  );
}
